<?php

$otherPage = 'gamesir.id';
$profileUrl = "https://www.instagram.com/$otherPage/";

function fetchData($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	$result = curl_exec($ch);
	curl_close($ch); 
	return $result;
}
$data = fetchData($profileUrl);
$data = preg_match('/window\.\_sharedData\s=\s(.*)\;<\/script>/i', $data, $matches);
var_dump(json_decode($matches[1], true));
file_put_contents(dirname(__FILE__) . '/../application/tmp/instagram.json', json_encode(json_decode($matches[1], true)));
die;
