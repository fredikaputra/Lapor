<?php

class Daftar extends Controller{
	public function index(){
		if (!isset($_SESSION['masyarakatNIK'])) {
			// buat data untuk di kirim ke view()
			$data['webtitle'] = 'Daftar';
			$data['css'] = ['base.css', 'daftar.css'];
			if (isset($_SESSION['register'])) {
				$data['js'] = ['confirmLeave.js'];
			}
			
			$this->view('template/header', $data);
			$this->view('daftar/index');
			$this->view('template/footer', $data);
		}else {
			header('location: ' . BASEURL);
		}
	}
	
	public function proccess(){
		if (!isset($_SESSION['masyarakatNIK'])) {
			if ($this->model('Daftar_model')->register($_POST) === TRUE) { // masyarakat berhasil teregistrasi
				header('location: ' . BASEURL . '/login');
				if (isset($_SESSION['register'])) { // kalau tadi sempat gagal saat registrasi
					unset($_SESSION['register']); // hapus sisa sesi pada form registrasi
				}
			}else {
				header('location: ' . BASEURL . '/daftar');
			}
		}else {
			header('location: ' . BASEURL);
		}
	}
}