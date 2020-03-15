<?php

class Daftar extends Controller{
	public function index(){
		$data['webtitle'] = 'Daftar';
		$data['css'] = ['base.css', 'daftar.css'];
		if (isset($_SESSION['register'])) {
			$data['register'] = [
				'nik' => $_SESSION['register']['nik'],
				'name' => $_SESSION['register']['name'],
				'username' => $_SESSION['register']['username'],
				'password' => $_SESSION['register']['password'],
				'phone' => $_SESSION['register']['phone'],
			];
		}
		
		$this->view('template/header', $data);
		$this->view('daftar/index', $data);
		$this->view('template/footer');
	}
	
	public function proccess(){
		if ($this->model('Proccess_model')->register($_POST) === TRUE) {
			header('location: ' . BASEURL . '/login');
			if (isset($_SESSION['register'])) {
				unset($_SESSION['register']);
			}
		}else {
			header('location: ' . BASEURL . '/daftar');
		}
	}
}