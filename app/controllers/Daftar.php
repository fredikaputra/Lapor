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
		
		// lakukan proses registrasi 
		if ($this->model('Register_model')->masyarakat() === TRUE) {
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