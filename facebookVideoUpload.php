<?php

require '../vendor/autoload.php';
require 'config/config.inc.php';

if(is_dir($tempVideoFolder))
	deleteDirectory($tempVideoFolder);

if(!isset($_POST['title']) && !isset($_POST['description']) && !isset($_POST['videoURL'])){
	header('Content-Type: application/json');
	die(json_encode([
		'status'=> 'error',
		'msg' => 'Error invalid parameters'
	]));
}

// folder to save downloaded files to. must end with slash
mkdir($tempVideoFolder);
$url = $_POST['videoURL'];
$F_name = $tempVideoFolder . "test.mp4";
file_put_contents( $F_name, fopen($url, 'r'));



$fb = new Facebook\Facebook([
	'app_id' => $facebook_app_id,
	'app_secret' => $facebook_app_secret,
	'default_graph_version' => 'v2.11',
]);

$data = [
	'title' => $_POST['title'],
	'description' => $_POST['description'],
	'source' => $fb->videoToUpload($tempVideoFolder . "test.mp4"),
];

try {
	$response = $fb->post('/'.$facebookPageId.'/videos', $data, $tokenPage);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
	// When Graph returns an error
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}

$graphNode = $response->getGraphNode();
var_dump($graphNode);

echo 'Video ID: ' . $graphNode['id'];