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
		$this->model('Check_model')->login($_POST);
		// header('location: ' . BASEURL . '/login');
	}
}