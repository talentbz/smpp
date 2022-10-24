<?php
	// require_once 'smppclient.class.php';
	// require_once 'gsmencoder.class.php';
	// require_once 'sockettransport.class.php';
	
	// // Construct transport and client
	// $transport = new SocketTransport(array('94.130.198.32'),65432);
	// $transport->setRecvTimeout(10000);
	// $smpp = new SmppClient($transport);

	// $phone_address = ['34632942304', '18452288755', '447398524945'];
	// // Open the connection
	// $transport->open();
	// $smpp->bindTransmitter("papax","cayou3");
	
	// // Prepare message
	// $message = 'Hello World €$£';
	// $encodedMessage = GsmEncoder::utf8_to_gsm0338($message);
	// $from = new SmppAddress('MelroseLabs',SMPP::TON_ALPHANUMERIC);
	// foreach($phone_address as $key=>$row){
	// 	$to = new SmppAddress($row ,SMPP::TON_INTERNATIONAL,SMPP::NPI_E164);	
	// 	// Send
	// 	$messageID = $smpp->sendSMS($from,$to,$encodedMessage);
	// 	echo '<pre>';
	// 	print_r($key.$messageID);
	// 	echo '</pre>';
	// }
	// echo '<pre>';
    // print_r($messageID);
    // echo '</pre>';
    // exit;
	// // Close connection
	// $smpp->close();
	$host    = "94.130.198.32";
	$port    = 65432;
	$message = "Hello Server";
	echo "Message To server :".$message;
	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	// connect to server
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	// send string to server
	//socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	// get server response
	$result = socket_read ($socket, 1024) or die("Could not read server response\n");
	echo "Reply From Server  :".$result;
	// close socket
	socket_close($socket);
?>