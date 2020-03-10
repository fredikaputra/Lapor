<?php

class Login extends Controller{
	public function index(){
		$this->model('Login_model')->login($_POST);
		header('location: ' . BASEURL . '/form-pengaduan');
	}
	
	public function unlock(){
		if ($this->model('Login_model')->unlock($_POST) === TRUE) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/dashboard/lock-screen');
		}
	}
}