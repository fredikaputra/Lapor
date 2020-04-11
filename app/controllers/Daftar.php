<?php

class Daftar extends Controller{
	public function index(){
		// deklarasikan data
		$data['webtitle'] = 'LAPOR! - Daftar';
		$data['css'] = ['sign.css', 'base.css'];
		$data['js'] = ['unsetload.js'];
		
		// tampilkan website serta kirim data nya ke view
		$this->view('template/header', $data);
		$this->view('page/daftar');
		$this->view('template/footer', $data);
	}
	
	// bagian proses
	public function proses(){ // proses daftar
		// loading screen
		$data['webtitle'] = 'Proses data...';
		$data['css'] = ['loading.css', 'base.css'];
		
		$this->view('template/header', $data);
		$this->view('page/loading');
		$this->view('template/footer', $data);
		
		if ($this->model('Daftar_model')->masyarakat() === TRUE) {
			header('location: ' . BASEURL); // ketika proses berhasil, pindah ke halaman landing page
		}else {
			header('location: ' . BASEURL . '/daftar'); // ketika proses gagal, balik ke halaman daftar
		}
	}
}