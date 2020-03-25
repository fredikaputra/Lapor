<?php

class Notfound extends Controller{
	public function index(){
		$data['webtitle'] = '404 - Halaman tidak ditemukan!';
		$data['css'] = ['notfound.css', 'base.css'];
		
		$this->view('template/header', $data);
		$this->view('page/notfound');
		$this->view('template/footer');
	}
}