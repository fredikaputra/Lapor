<?php

class Daftar extends Controller{
	public function index(){
		// buat data untuk di kirim ke view()
		$data['webtitle'] = 'Daftar';
		$data['css'] = ['base.css', 'daftar.css'];
		
		$this->view('template/header', $data);
		$this->view('daftar/index');
		$this->view('template/footer');
	}
	
	public function proccess(){
		if ($this->model('Daftar_model')->register($_POST) === TRUE) { // masyarakat berhasil teregistrasi
			header('location: ' . BASEURL . '/login');
			if (isset($_SESSION['register'])) { // kalau tadi sempat gagal saat registrasi
				unset($_SESSION['register']); // hapus sisa sesi pada form registrasi
			}
		}else {
			header('location: ' . BASEURL . '/daftar');
		}
	}
}