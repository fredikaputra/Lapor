<?php

class Pagenotfound extends Controller{
	public function index(){
		$data['css'] = ['base.css', 'notfoundpage.css'];
		$data['webtitle'] = 'Halaman tidak ditemukan!';
		
		$this->view('template/header', $data);
		$this->view('template/notfoundpage');
		$this->view('template/footer');
	}
}