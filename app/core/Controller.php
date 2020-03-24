<?php

class Controller{
	public function view($view, $data = []){
		require_once 'app/views/' . $view . '.php';
	}
	
	public function method($method, $data = ''){
		require_once 'app/methods/' . $method . '.php';
		return new $method($data);
	}
}