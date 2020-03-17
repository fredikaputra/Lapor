<?php

class Formulir_pengaduan extends Controller{
	public function index(){
		$data['css'] = ['base.css', 'formulir_pengaduan.css'];
		$data['webtitle'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		
		$this->view('template/header', $data);
		$this->view('template/nav');
		$this->view('formulir_pengaduan/index');
		$this->view('template/footer');
	}
	
	public function proccess(){
		if ($this->model('UploadPengaduan_model')->send($_POST, $_FILES) === 'LOGIN'){
			header('location: ' . BASEURL . '/login');
		}else {
			header('location: ' . BASEURL . '/formulir-pengaduan');
		}
	}
}