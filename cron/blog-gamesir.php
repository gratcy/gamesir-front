<?php

$profileUrl = "https://blog.gamesir.id/feed/";

function fetchData($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	$result = curl_exec($ch);
	curl_close($ch); 
	$result = str_replace("<content:encoded>","<contentEncoded>",$result);
	$result = str_replace("</content:encoded>","</contentEncoded>",$result);
	return $result;
}
$data = fetchData($profileUrl);
$Json = json_encode(simplexml_load_string($data, "SimpleXMLElement", LIBXML_NOCDATA));
file_put_contents(dirname(__FILE__) . '/../application/tmp/blog-gamesir.json', $Json);
die;
