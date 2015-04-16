<?php
	$url = "http://geci.me/api/lyric/".$_GET["songName"]; 
	$link_arr = array();
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	$str = curl_exec($ch);
	curl_close($ch);
	$arr = json_decode($str);
	$res = $arr->result;
	foreach ($res as $key) {
       	array_push($link_arr, $key->lrc);
	}
	$file = fopen($link_arr[0], "r") or die("error");
	while (!feof($file)) {
		echo fgetc($file);
	}
	// echo $link_arr[0];
?>