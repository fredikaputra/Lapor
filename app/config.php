<?php

define('BASEURL', 'http://localhost/website/lapor');

$number = count(explode('/', BASEURL));
$path = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path = explode('/', $path);
$path = array_slice($path, 0, $number);
$path = implode('/', $path);

if ($path !== BASEURL) {
	die("<br /><strong>Fatal Error</strong>: 'BASEURL' does not match the url address in <strong>app\config.php</strong>");
}

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_praktek');