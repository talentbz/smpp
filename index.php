<?php
require_once 'vendor/autoload.php';

use OnlineCity\Transport\SocketTransport;
use OnlineCity\SMPP\SMPP;
use OnlineCity\SMPP\SmppClient;
use OnlineCity\SMPP\SmppAddress;
use OnlineCity\Encoder\GsmEncoder; 

// Construct transport and client
$transport = new SocketTransport(array('94.130.198.32'),65432);
$transport->setRecvTimeout(10000);
$smpp = new SmppClient($transport);

// Activate binary hex-output of server interaction
$smpp->debug = true;
$transport->debug = true;

// Open the connection
$transport->open();
$smpp->bindTransmitter("papax","cayou3");

// Optional connection specific overrides
//SmppClient::$sms_null_terminate_octetstrings = false;
//SmppClient::$csms_method = SmppClient::CSMS_PAYLOAD;
//SmppClient::$sms_registered_delivery_flag = SMPP::REG_DELIVERY_SMSC_BOTH;

// Prepare message
$message = 'H€llo world';
$encodedMessage = GsmEncoder::utf8_to_gsm0338($message);
$from = new SmppAddress('SMPP Test',SMPP::TON_ALPHANUMERIC);
$to = new SmppAddress(4512345678,SMPP::TON_INTERNATIONAL,SMPP::NPI_E164);

// Send
$smpp->sendSMS($from,$to,$encodedMessage,$tags);

// Close connection
$smpp->close();