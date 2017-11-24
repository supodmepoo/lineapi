<?php

require_once __DIR__.'/vendor/autoload.php';

$token_access 	= 'slhaMqaHkp1bscJ8uOp059U33TW/1Oh09GOG8M3QJdL9pGu29+ibRJYHW5fsi+l8zft0WjPmVRrZa/lnZyR/k3iU+mOqOvwNirBFEptNQHaf4br0APfSxbqEknnZ34pVe4PGE4S9Qwuid1ImsPJ/1wdB04t89/1O/w1cDnyilFU=';
$httpClient 	= new \LINE\LINEBot\HTTPClient\CurlHTTPClient($token_access);
$bot 			= new \LINE\LINEBot($httpClient, ['channelSecret' => '798a6fe2afc3c6a5a763f8cd5f3d368a']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage('nHuyWiB7yP5Zw52FIkcQobQuGDXCTA', $textMessageBuilder);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}

// Failed
echo $response->getHTTPStatus() . ' ' . $response->getRawBod
