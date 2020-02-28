<?php

class Login extends Controller{
	public function masyarakat(){
		$this->model('Login_model')->loginMasyarakat($_POST);
		header('location: ' . BASEURL . '/lapor');
	}
}