<?php

class Daftar extends Controller{
	public function index(){
		if ($this->model('Daftar_model')->addMasyarakat() > 0) {
			header('location: ' . BASEURL . '/lapor');
			exit;
		}else {
			header('location: ' . BASEURL . '/gagal');
			exit;
		}
	}
}