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