<?php

class Daftar{
	public function index(){
		// use register model
		$this->model('Register_model')->register($_POST);
		// header('location: ' . BASEURL . '/lapor');
	}
}