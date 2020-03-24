<?php

// konfigurasi alamat url
// ganti isi BASEURL jika alamat url bermasalah
// contoh: http://localhost/lapor
// jangan beri tanda '/' (slash) pada akhir alamat url
define('BASEURL', 'http://localhost/website/lapor');

// fungsi untuk mengecek alamat url
$number = count(explode('/', BASEURL));
$path = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path = explode('/', $path);
$path = array_slice($path, 0, $number);
$path = implode('/', $path);

if ($path !== BASEURL) { // jika error, ubah konfigurasi BASEURL sesuai alamat root browser
	die("<br /><strong>Fatal Error</strong>: 'BASEURL' does not match the url address in <strong>app\config.php</strong>");
}

// konfigurasi database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_praktek');