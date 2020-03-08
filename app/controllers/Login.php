<?php

class Login extends Controller{
	public function index(){
		$this->model('Login_model', $_POST);
		header('location: ' . BASEURL . '/form-pengaduan');
	}
}