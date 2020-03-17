<?php

class Daftar extends Controller{
	public function index(){
		$data['webtitle'] = 'Daftar';
		$data['css'] = ['base.css', 'daftar.css'];
		
		$this->view('template/header', $data);
		$this->view('daftar/index');
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