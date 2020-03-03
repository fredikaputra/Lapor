<?php

// autoload class in app dir
spl_autoload_register(function($class){
	require_once 'core/' . $class . '.php';
});

// load config file
require_once 'config.php';