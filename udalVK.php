<?php

$urls = explode("\n", file_get_contents('./urls2.txt'));


foreach ($urls as $url)
{
	$needle = strstr($url, 'vk.com') !== false ? 'Ошибка' : 'notifyPanel_msg';
	$ch = curl_init(trim($url));
	curl_setopt_array($ch, [
		CURLOPT_RETURNTRANSFER => true,   // return web page
		CURLOPT_HEADER         => false,  // don't return headers
		CURLOPT_FOLLOWLOCATION => true,   // follow redirects
	]);
	$response = curl_exec($ch);
	curl_close($ch);
	if ($response) {
		if (strstr($response, $needle)) {
			echo "Да\n";
		} else {
			echo "\n";
		}
	} else {
		echo "\n";
	}
}

