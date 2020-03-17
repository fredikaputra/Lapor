<?php

if (!session_id()) session_start();

date_default_timezone_set('Asia/Makassar');

require_once 'app/init.php';

$app = new App;

var_dump($_SESSION);
echo '<br />';
var_dump($_POST);
echo '<br />';
var_dump($_FILES);