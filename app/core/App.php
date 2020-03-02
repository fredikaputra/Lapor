<?php

// pretty url
class App{
	private $controller = 'Beranda';
	private $method = 'index';
	private $parameter = [];
	
	// rerouting
	public function __construct(){
		$url = $this->parseURL();
		
		// check if controller exists
		if (file_exists('app/controllers/' . $url[0] . '.php')) {
			if ($url[0] != 'dashboard') {
				$this->controller = $url[0];
				unset($url[0]);
			}else {
				if (isset($_SESSION['petugasID'])) {
					$this->controller = $url[0];
					unset($url[0]);
				}
			}
		}
		
		// require controller
		require_once 'app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;
		
		// check if method exists
		if (isset($url['1'])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		
		// check if parameter exists
		if (!empty($url)) {
			$this->parameter = array_values($url);
		}
		
		// run function
		call_user_func_array([$this->controller, $this->method], $this->parameter);
	}
	
	// convert ?url to /url/
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