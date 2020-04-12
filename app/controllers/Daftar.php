<?php

class Daftar extends Controller{
	public function index(){
		
		// deklarasikan variable
		// untuk dikirimkan ke halaman website
		$data['webtitle'] = 'LAPOR! - Daftar';
		$data['css'] = ['sign.css', 'base.css'];
		$data['js'] = ['unsetload.js'];
		
		// tampilkan website
		// kirim semua data ($data) ke dalam website
		$this->view('template/header', $data);
		$this->view('page/daftar');
		$this->view('template/footer', $data);
	}
	
	// proses registrasi
	public function proses(){
		
		// tampilkan loading screen
		// ketika proses memakan waktu yang lama
		$data['webtitle'] = 'Proses data...';
		$data['css'] = ['loading.css', 'base.css'];
		
		$this->view('template/header', $data);
		$this->view('page/loading');
		$this->view('template/footer', $data);
		
		// lakukan proses registrasi 
		if ($this->model('Daftar_model')->masyarakat() === TRUE) {
			// ketika proses berhasil
			// pindah ke halaman landing page
			header('location: ' . BASEURL);
		}
		else {
			// ketika proses gagal
			// kembali ke halaman daftar
			header('location: ' . BASEURL . '/daftar');
		}
	}
}