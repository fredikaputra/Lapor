<?php

class App{
	private $controller = 'Beranda';
	private $method = 'index';
	private $parameter = [];
	
	public function __construct(){
		$url = $this->parseURL();
		
		if (isset($url[0])) { // cek ketika ada kontroller
			if (strpos($url[0], '-')) { // cek kalau ada kontroller yang mengandung strip (-)
				$url[0] = str_replace('-', '_', $url[0]); // ubah string (-) menjadi underscore (_)
			}
			if (file_exists('app/controllers/' . $url[0] . '.php')) { // cek kalau file kontroller ada
				$this->controller = $url[0];
				unset($url[0]);
			}
		}
		
		require_once 'app/controllers/' . $this->controller . '.php'; // panggil file kontroller
		$this->controller = new $this->controller; // inisialisasi controller
		
		if (isset($url[1])) { // cek ketika ada method
			if (method_exists($this->controller, $url[1])) { // cek ketika method tersedia
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		
		if (!empty($url)) { // cek ketika url mengandung parameter
			$this->parameter = array_values($url);
		}
		
		// jalankan fungsi routing
		call_user_func_array([$this->controller, $this->method], $this->parameter);
	}
	
	public function parseURL(){
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
			$url = rtrim($url, '/'); // potong (/) pada akhir url
			$url = filter_var($url, FILTER_SANITIZE_URL); // menghilangkan karakter yang aneh aneh
			$url = explode('/', $url); // pecah url menggunakan (/)
			return $url;
		}
	}
}