<?php
require_once 'vendor/autoload.php';

$service = new \PhpSmpp\Service\Sender(['94.130.198.32'], 'papax', 'cayou3');
$smsId = $service->send(34632942304, 'Hello world!', 'Sender');