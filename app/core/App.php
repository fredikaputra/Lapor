<?php

class App{
	private $controller = 'Beranda';
	private $method = 'index';
	private $parameter = [];
	
	public function __construct(){
		$url = $this->parseURL();
		
		// cek kontroler
		if (isset($url[0])) {
			
			$url[0] = ucfirst($url[0]);
			
			// ubah kontroller yang mengandung '-' menjadi '_'
			if (strpos($url[0], '-') !== FALSE) {
				$url[0] = str_replace('-', '_', $url[0]);
			}
			
			// tampilkan halaman '404 notfound'
			// ketika file controller
			// tidak ditemukan
			if (!file_exists('app/controllers/' . $url[0] . '.php')) {
				$this->controller = 'Notfound';
			}
			
			// tampilkan halaman website yang diminta
			// ketika file controller ditemukan
			else {
				$this->controller = $url[0];
			}
			
			unset($url[0]);
		}
		
		// ambil file controller
		require_once 'app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;
		
		// cek method
		if (isset($url[1])) {
			
			// ubah method yang mengandung '-' menjadi '_'
			if (strpos($url[1], '-')) {
				$url[1] = str_replace('-', '_', $url[1]);
			}
			
			// gunakan method yang diminta
			// ketika method tersedia
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
			}
			
			unset($url[1]);
		}
		
		// cek parameter
		if (!empty($url)) {
			$this->parameter = array_values($url);
		}
		
		// jalankan fungsi call_user_func_array
		call_user_func_array([$this->controller, $this->method], $this->parameter);
	}
	
	public function parseURL(){
		if (isset($_GET['url'])) { // cek alamat url
			$url = $_GET['url'];
			$url = rtrim($url, '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}