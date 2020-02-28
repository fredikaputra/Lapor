<?php

class Daftar extends Controller{
	public function index(){
		$this->model('Signup_model')->addMasyarakat($_POST);
		header('location: ' . BASEURL . '/lapor');
	}
}