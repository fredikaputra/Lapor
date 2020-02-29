<?php

// use auto load all classes in core dir
// spl = standard php library
spl_autoload_register(function($class){
	require_once 'core/' . $class . '.php';
});

// call config
require_once 'config.php';