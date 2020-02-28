<?php

// if session not run, start the session
if (!session_id()) session_start();

// set timezone to wita
date_default_timezone_set('Asia/Makassar');

// require all the app
require_once 'app/init.php';

// initalize the app
$app = new App;