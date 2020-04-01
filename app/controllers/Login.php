<?php

class Login extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Login';
		$data['css'] = ['sign.css', 'base.css'];
		
		$this->view('template/header', $data);
		$this->view('page/login');
		$this->view('template/footer');
	}
	
	public function proccess(){
		if ($this->model('Login_model')->proccess($_POST) === FALSE) {
			header('location: ' . BASEURL . '/login');
		}else {
			header('location: ' . BASEURL);
		}
	}
}