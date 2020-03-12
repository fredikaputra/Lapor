<?php

// config for base url
// example: http://localhost/lapor for 'localhost/lapor'
// don't give '/' at the end of url
// define('BASEURL', 'http://192.168.1.5/website/lapor');
define('BASEURL', 'http://localhost/website/lapor');

// check if base url is correct
// this proccess just for offline installation perpose only, not for hosting!
$number = count(explode('/', BASEURL));
$path = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path = explode('/', $path);
$path = array_slice($path, 0, $number);
$path = implode('/', $path);

if ($path !== BASEURL) {
	die('Error: Please change the path in the config file');
}
// end of check url proccess


// config for database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_lapor');