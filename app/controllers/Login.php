<?php

class Login extends Controller{
	public function index(){
		$data['webtitle'] = 'Login';
		$data['css'] = ['base.css', 'login.css'];
		
		$this->view('template/header', $data);
		$this->view('login/index');
		$this->view('template/footer');
	}
	
	public function proccess(){
		if ($this->model('Login_model')->login($_POST) === 'HOME') {
			header('location: ' . BASEURL);
		}else if ($this->model('Login_model')->login($_POST) === 'FORM'){
			header('location: ' . BASEURL . '/formulir-pengaduan/proccess');
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
}