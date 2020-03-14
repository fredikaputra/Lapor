<?php

spl_autoload_register(function($class){
	require_once 'app/core/' . $class . '.php';
});

require_once 'config.php';