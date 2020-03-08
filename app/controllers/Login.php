<?php

class Login extends Controller{
	public function index(){
		$this->model('Login_model')->login($_POST);
		header('location: ' . BASEURL . '/lapor');
	}
}