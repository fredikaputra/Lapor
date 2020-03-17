<?php

class Formulir_pengaduan extends Controller{
	public function index(){
		// buat data untuk di kirim ke view()
		$data['css'] = ['base.css', 'formulir_pengaduan.css'];
		$data['webtitle'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		
		$this->view('template/header', $data);
		$this->view('template/nav');
		$this->view('formulir_pengaduan/index');
		$this->view('template/footer');
	}
	
	public function proccess(){
		if ($this->model('UploadPengaduan_model')->send($_POST, $_FILES) === 'LOGIN'){ // kalau user belum login
			header('location: ' . BASEURL . '/login'); // login terlebih dahulu
		}else {
			header('location: ' . BASEURL . '/formulir-pengaduan');
		}
	}
}