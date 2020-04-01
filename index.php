<?php

if (!session_id()) session_start(); // jalankan session ketika session tidak berjalan

date_default_timezone_set('Asia/Makassar'); // atur waktu ke wita

require_once 'app/init.php'; // panggil file init.php

$app = new App; // jalankan aplikasinya

// echo '<br />';
// var_dump($_POST);
// echo '<br />';
// var_dump($_SESSION);
// echo '<br />';
// var_dump($_FILES);