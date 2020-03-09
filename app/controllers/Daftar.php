<?php

class Daftar extends Controller{
	public function index(){
		$this->model('Register_model')->masyarakat($_POST);
		header('location: ' . BASEURL);
	}
}