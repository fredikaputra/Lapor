<?php

class Daftar extends Controller{
	public function index(){
		if (!isset($_SESSION['masyarakatNIK'])) {
			// buat data untuk di kirim ke view()
			$data['webtitle'] = 'Daftar';
			$data['css'] = ['base.css', 'daftar.css'];
			
			if (isset($_SESSION['register'])) { // cek session register kebuat
				$data['js'] = ['confirmLeave.js']; // panggil confirmLeave.js
			}
			
			$this->view('template/header', $data);
			$this->view('daftar/index');
			$this->view('template/footer', $data);
		}else { // kalau sudah login, ngg bisa daftar
			header('location: ' . BASEURL);
		}
	}
	
	public function proccess(){
		if (!isset($_SESSION['masyarakatNIK'])) {
			if ($this->model('Daftar_model')->register($_POST) === TRUE) { // masyarakat berhasil teregistrasi
				if (isset($_SESSION['register'])) { // kalau tadi sempat gagal saat registrasi
					unset($_SESSION['register']); // hapus sisa sesi pada form registrasi
				}
				header('location: ' . BASEURL . '/login');
			}else {
				header('location: ' . BASEURL . '/daftar');
			}
		}else { // kalau sudah login, ngg bisa daftar
			header('location: ' . BASEURL);
		}
	}
}