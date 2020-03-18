<?php

class Login extends Controller{
	public function index(){
		if (!isset($_SESSION['masyarakatNIK'])) {
			// buat data untuk di kirim ke view()
			$data['webtitle'] = 'Login';
			$data['css'] = ['base.css', 'login.css'];
			
			$this->view('template/header', $data);
			$this->view('login/index');
			$this->view('template/footer');
		}else { // kalau sudah login, ngg bisa login
			header('location: ' . BASEURL);
		}
	}
	
	public function proccess(){
		if (!isset($_SESSION['masyarakatNIK'])) {
			if ($this->model('Login_model')->login($_POST) === TRUE) {  // kondisi normal
				header('location: ' . BASEURL);
			}else { // ketika user salah masukkan data
				header('location: ' . BASEURL . '/login');
			}
		}else { // kalau sudah login, ngg bisa login
			header('location: ' . BASEURL);
		}
	}
}