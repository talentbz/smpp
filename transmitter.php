<?php
print "<pre>";
require_once "smpp.php";
$tx=new SMPP('94.130.198.32',65432);

$tx->debug=true;
$tx->system_type="WWW";
$tx->addr_npi=1;
print "open status: ".$tx->state."\n";
$tx->bindTransmitter("papax","cayou3");
$tx->sms_source_addr_npi=1;
//$tx->sms_source_addr_ton=1;
$tx->sms_dest_addr_ton=1;
$tx->sms_dest_addr_npi=1;
$tx->sendSMS("2121","34632942304","Hello world!");
// print_r($tx);
// exit;
$tx->close();
unset($tx);
print "</pre>";
?>