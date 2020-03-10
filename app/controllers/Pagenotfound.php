<?php

class Pagenotfound extends Controller{
	public function index(){
		$data['title'] = 'Halaman tidak ditemukan!';
		$data['css'] = ['base.css', 'pagenotfound.css'];
		$data['js'] = ['outline.js'];
		
		$this->view('template/header', $data);
		$this->view('pagenotfound/index', $data);
	}
}