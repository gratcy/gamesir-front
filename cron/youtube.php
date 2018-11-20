<?php
$baseUrl = 'https://www.googleapis.com/youtube/v3/';
// https://developers.google.com/youtube/v3/getting-started
$apiKey = 'AIzaSyBWX7GLREnUAMYLqJYqdF4X5WTMX-sPZT8';
// If you don't know the channel ID see below
$channelId = 'UCZhblvtYPVNoxR6APnRpbCA';

$params = [
	'id'=> $channelId,
	'part'=> 'contentDetails',
	'key'=> $apiKey
];
$url = $baseUrl . 'channels?' . http_build_query($params);
$json = json_decode(file_get_contents($url), true);

$playlist = $json['items'][0]['contentDetails']['relatedPlaylists']['uploads'];

$params = [
	'part'=> 'snippet',
	'playlistId' => $playlist,
	'maxResults'=> '50',
	'key'=> $apiKey
];
$url = $baseUrl . 'playlistItems?' . http_build_query($params);
$json = json_decode(file_get_contents($url), true);

$videos = [];
foreach($json['items'] as $video)
	$videos[] = $video['snippet']['resourceId']['videoId'];

while(isset($json['nextPageToken'])){
	$nextUrl = $url . '&pageToken=' . $json['nextPageToken'];
	$json = json_decode(file_get_contents($nextUrl), true);
	foreach($json['items'] as $video)
		$videos[] = $video;
}

file_put_contents(dirname(__FILE__) . '/../application/tmp/youtube.json', json_encode($videos));
