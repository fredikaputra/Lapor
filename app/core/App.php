<?php

class App{
	private $controller = 'Beranda';
	private $method = 'index';
	private $parameter = [];
	
	// routing proccess
	public function __construct(){
		$url = $this->parseURL();
		
		// controller
		if (strpos($url[0], '-')) { // check if controller contain dash (-)
			$url[0] = str_replace('-', '', $url[0]);
			if (file_exists('app/controllers/' . $url[0] . '.php')) {
				$this->controller = $url[0];
				unset($url[0]);
			}
		}else {
			if (file_exists('app/controllers/' . $url[0] . '.php')) {
				$this->controller = $url[0];
				unset($url[0]);
			}
		}
		
		require_once 'app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;
		
		// method
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		
		// paramter
		if (!empty($url)) {
			$this->parameter = array_values($url);
		}
		
		// run function
		call_user_func_array([$this->controller, $this->method], $this->parameter);
	}
	
	// filter url
	public function parseURL(){
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
			$url = rtrim($url, '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}