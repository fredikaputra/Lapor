<?php

class Login extends Controller{
	public function index(){
		if (isset($_SESSION['masyarakatNIK'])) {
			// kalau masyarakat sudah login, pindah kan ke halaman formulir pengaduan
			header('location: ' . BASEURL . '/formulir-pengaduan');
		}else if (isset($_SESSION['petugasID'])) {
			// kalau masyarakat sudah login, pindah kan ke halaman dashboard
			header('location: ' . BASEURL . '/dashboard');
		}else {
			// deklarasikan data
			$data['webtitle'] = 'LAPOR! - Login';
			$data['css'] = ['sign.css', 'base.css'];
			
			// tampilkan website serta kirim data nya ke view
			$this->view('template/header', $data);
			$this->view('page/login');
			$this->view('template/footer');
		}
	}
	
	// bagian proses
	public function proccess(){
		if ($this->model('Login_model') === TRUE) {
			if (isset($_SESSION['onLock'])) {
				unset($_SESSION['onLock']);
				header('location: ' . BASEURL . '/dashboard');
			}else {
				header('location: ' . BASEURL);
			}
		}else if (isset($_SESSION['onLock'])){
			header('location: ' . BASEURL . '/dashboard/kunci');
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
}