<?php

require '../vendor/autoload.php';

if(!isset($_GET['url'])){
	header('Content-Type: application/json');
	die(json_encode([
			'status'=> 'error',
			'msg' => 'Error Url or id invalid'
		]));
}

$video = new pxgamer\YDP\Downloader($_GET['url']);

$title = $video->info['title'];
$thumb = "https://img.youtube.com/vi/".$video->vid_id."/maxresdefault.jpg";
$quality = [];
$fileType = [];
$fileExt = [];
$urls = [];

foreach ($video->formats as $f){
	array_push($quality, $f['quality']);
	array_push($urls, $f['url']);
	array_push($fileType, $f['type']);
}

header('Content-Type: application/json');
echo json_encode([
		'status'=> 'ok',
		'title' => $title,
		'thumb' => $thumb,
		'quality' => $quality,
		'fileType' => $fileType,
		'urls' => $urls
	]);