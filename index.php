<?php

// start session
if (!session_id()) session_start();

// set default time to wita
date_default_timezone_set('Asia/Makassar');

// load class in app dir
require_once 'app/init.php';

// initialize app
$app = new App;