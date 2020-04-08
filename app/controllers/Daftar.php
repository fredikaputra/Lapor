<?php

class Daftar extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Daftar';
		$data['css'] = ['sign.css', 'base.css'];
		$data['js'] = ['unsetload.js'];
		
		$this->view('template/header', $data);
		$this->view('page/daftar');
		$this->view('template/footer', $data);
	}
	
	public function proccess(){
		if ($this->model('Daftar_model')->masyarakat() === TRUE) {
			header('location: ' . BASEURL);
		}else {
			header('location: ' . BASEURL . '/daftar');
		}
	}
}