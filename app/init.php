<?php

require_once 'config.php'; // panggil file config.php

spl_autoload_register(function($class){ // panggil semua class yang ada dalam folder core
	require_once 'core/' . $class . '.php';
});