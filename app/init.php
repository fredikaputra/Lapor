<?php

// use auto load all classes in core dir
// spl = standard php library
spl_autoload_register(function($class){
	require_once 'core/' . $class . '.php';
});

require_once 'config.php';