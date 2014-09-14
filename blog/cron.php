<?php

$host = 'ucm.hosting.acm.org';
$port = '61079';
$cron = true; // Set $cron = false to Stop cron

if(@$_SERVER['SERVER_PORT'] > 1){
	die('Not accesible via the web !');
}

if($cron == true){
	$checkconn = @fsockopen($host, $port, $errno, $errstr, 5);
	if(empty($checkconn)){
		exec('export HOME=/home/ucmacm/nodejs; cd /home/ucmacm/public_html/blog; /home/ucmacm/nodejs/bin/npm start --production >> /home/ucmacm/nodejs/ghost61079.log 2>&1 &', $out, $ret);		
	}
}

?>