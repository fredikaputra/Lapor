<?php

class Login extends Controller{
	public function index(){
		if (isset($_SESSION['masyarakatNIK'])) {
			header('location: ' . BASEURL . '/formulir-pengaduan');
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			$data['webtitle'] = 'LAPOR! - Login';
			$data['css'] = ['sign.css', 'base.css'];
			
			$this->view('template/header', $data);
			$this->view('page/login');
			$this->view('template/footer');
		}
	}
	
	public function proccess(){
		if ($this->model('Login_model')->proccess($_POST) === TRUE) {
			header('location: ' . BASEURL);
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
}