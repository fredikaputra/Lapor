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
		if ($this->model('Check_model')->register($_POST) === TRUE) {
			header('location: ' . BASEURL . '/login');
		}else {
			header('location: ' . BASEURL . '/daftar');
		}
	}
}