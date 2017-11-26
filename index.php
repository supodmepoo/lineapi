<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';
// Get POST body content
$content 		= file_get_contents('php://input');

// Parse JSON
$events 		= json_decode($content, true);

$token_access 	= 'slhaMqaHkp1bscJ8uOp059U33TW/1Oh09GOG8M3QJdL9pGu29+ibRJYHW5fsi+l8zft0WjPmVRrZa/lnZyR/k3iU+mOqOvwNirBFEptNQHaf4br0APfSxbqEknnZ34pVe4PGE4S9Qwuid1ImsPJ/1wdB04t89/1O/w1cDnyilFU=';

$httpClient 		= new \LINE\LINEBot\HTTPClient\CurlHTTPClient($token_access);
$bot 				= new \LINE\LINEBot($httpClient, ['channelSecret' => '798a6fe2afc3c6a5a763f8cd5f3d368a']);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');

// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			$_SESSION['users_id'] = $event['message']['type'];
			$response = $bot->replyMessage($replyToken, $textMessageBuilder);
			echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
		}
	}
}

print_r($_SESSION['users_id']);

