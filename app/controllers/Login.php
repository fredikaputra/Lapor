<?php

class Login extends Controller{
	public function index(){
		
		// pindah ke halaman formulir pengaduan
		// jika pengguna sudah login
		// dan berstatus masyarakat
		if (isset($_SESSION['masyarakatNIK'])) {
			header('location: ' . BASEURL . '/formulir-pengaduan');
		}
		
		// pindah ke halaman dashboard
		// jika pengguna sudah login
		// dan berstatus petugas
		else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}
		
		// tampilkan halaman login
		// jika pengguna belum login
		else {
			
			// deklarasikan variable
			// untuk dikirimkan ke halaman website
			$data['webtitle'] = 'LAPOR! - Login';
			$data['css'] = ['sign.css', 'base.css'];
			
			// tampilkan website
			// kirim semua data ($data) ke dalam website
			$this->view('template/header', $data);
			$this->view('page/login');
			$this->view('template/footer');
		}
	}
	
	// proses login masyarakat, petugas, dan admin
	public function proses(){
		
		// lanjut ketika
		// username dan password benar
		if ($this->model('Login_model')->proccess() === TRUE) {
			
			// ketika yang login
			// adalah petugas
			// dalam kondisi terkunci
			// maka pindahkan ke halaman dashboard
			if (isset($_SESSION['onLock'])) {
				unset($_SESSION['onLock']);
				$_SESSION['loadingscreen'] = 1;
				header('location: ' . BASEURL . '/dashboard');
			}
			
			// kalau tidak dalam
			// kondisi terkunci
			// tetapi yang login petugas
			// maka pindahkan ke halaman dashboard
			else if (isset($_SESSION['petugasID'])) {
				$_SESSION['loadingscreen'] = 1;
				header('location: ' . BASEURL . '/dashboard');
			}
			
			// kalau tidak dalam
			// kondisi terkunci
			// maka pindahkan ke halaman landing page
			else if (isset($_SESSION['petugasID'])) {
				$_SESSION['loadingscreen'] = 1;
				header('location: ' . BASEURL);
			}
		}
		
		// kunci pengguna
		// ketika dalam kondisi terkunci
		// login gagal
		else if (isset($_SESSION['onLock'])){
			$_SESSION['loadingscreen'] = 1;
			header('location: ' . BASEURL . '/dashboard/kunci');
		}
		
		// pindahkan ke halaman login
		// ketika gagal login
		else {
			$_SESSION['loadingscreen'] = 1;
			header('location: ' . BASEURL . '/login');
		}
	}
}