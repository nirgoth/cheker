<?php

$urls = explode("\n", file_get_contents('./urls2.txt'));


foreach ($urls as $url)
{
	
	$ch = curl_init(trim($url));
	curl_setopt_array($ch, [
		CURLOPT_RETURNTRANSFER => true,   // return web page
		CURLOPT_HEADER         => false,  // don't return headers
		CURLOPT_FOLLOWLOCATION => true,   // follow redirects
	]);
	$response = curl_exec($ch);
	curl_close($ch);
	$dom = new DomDocument;
	$txt = 'Этой страницы нет в OK';
	$txt1 = 'удалена или не является публично доступной';
	if(strpos($response, $txt) or strpos($response, $txt1)) {
		echo "Да\n";
	} else {
		echo "\n";
	}
	usleep(40000);
	//echo $response;
}