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
		}else {
			header('location: ' . BASEURL);
		}
	}
	
	public function proccess(){
		if (!isset($_SESSION['masyarakatNIK'])) {
			if ($this->model('Login_model')->login($_POST) === 'HOME') {  // kondisi normal
				header('location: ' . BASEURL);
			}else if ($this->model('Login_model')->login($_POST) === 'FORM'){ // kondisi ketika user diperintahkan untuk login oleh sistem form
				header('location: ' . BASEURL . '/formulir-pengaduan/proccess');
			}else { // ketika user salah masukkan data
				header('location: ' . BASEURL . '/login');
			}
		}else {
			header('location: ' . BASEURL);
		}
	}
}