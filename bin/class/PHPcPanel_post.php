<?php

$f=($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
$f = ($f) ? $f : $_SERVER["REMOTE_ADDR"]; 

function PHPcPanel_PostRequest($url, $referer, $_data) {
	$data = array();
	while(list($n,$v) = each($_data)){
		$data[] = "$n=$v";
	}
	$data = implode('&', $data);
	$url = parse_url($url);
	if ($url['scheme'] != 'http') {
		die('Only HTTP request are supported !');
	}
	$host = $url['host'];
	$path = $url['path'];
	$query = $url['query'];
	$fp = fsockopen($host, 80);
	fputs($fp, "POST $path?$query HTTP/1.1\r\n");
	fputs($fp, "Host: $host\r\n");
	fputs($fp, "Referer: $referer\r\n");
	fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
	fputs($fp, "Content-length: ". strlen($data) ."\r\n");
	fputs($fp, "Connection: close\r\n\r\n");
	fputs($fp, $data);
	$result = '';
	while(!feof($fp)) {
		$result .= fgets($fp, 128);
	}
	fclose($fp);
	$result = explode("\r\n\r\n", $result, 2);
	$header = isset($result[0]) ? $result[0] : '';
	$content = isset($result[1]) ? $result[1] : '';
	return array($header, $content);
}

?>