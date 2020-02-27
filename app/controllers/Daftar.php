<?php

class Daftar extends Controller{
	public function index(){
		$this->model('Daftar_model')->addMasyarakat($_POST);
	}
}