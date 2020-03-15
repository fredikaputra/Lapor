<?php

class Daftar extends Controller{
	public function index(){
		$data['webtitle'] = 'Daftar';
		$data['css'] = ['base.css', 'daftar.css'];
		
		$this->view('template/header', $data);
		$this->view('daftar/index');
		$this->view('template/footer');
	}
}