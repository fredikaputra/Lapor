<?php

class Formpengaduan extends Controller{
	public function index(){
		$data['title'] = 'LAPOR! - Sampaikan Aspirasi Anda';
		$data['css'] = ['base.css', 'formpengaduan.css'];
		$data['js'] = ['autoResize.js'];
		
		$this->view('template/header', $data);
		$this->view('formpengaduan/index');
		$this->view('template/footer', $data);
	}
}