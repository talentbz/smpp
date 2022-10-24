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
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	socket_connect($socket, '94.130.198.32', 65432);

	while (TRUE) {
			$r = array($socket);
			$c = socket_select($r, $w = NULL, $e = NULL, 5);
			print_r($r);
			exit;
			foreach ($r as $read_socket) {
					if ($r = negotiate($read_socket)) {
							var_dump($r);
							exit;
					}
			}
	}

	function negotiate ($socket) {
			socket_recv($socket, $buffer, 1024, 0);

			for ($chr = 0; $chr < strlen($buffer); $chr++) {
					if ($buffer[$chr] == chr(255)) {

							$send = (isset($send) ? $send . $buffer[$chr] : $buffer[$chr]);

							$chr++;
							if (in_array($buffer[$chr], array(chr(251), chr(252)))) $send .= chr(254);
							if (in_array($buffer[$chr], array(chr(253), chr(254)))) $send .= chr(252);

							$chr++;
							$send .= $buffer[$chr];
					} else {
							break;
					}
			}

			if (isset($send)) socket_send($socket, $send, strlen($send), 0);
			if ($chr - 1 < strlen($buffer)) return substr($buffer, $chr);

	}
?>