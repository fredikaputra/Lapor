<?php

class Formulir_pengaduan extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Sampaikan Aspirasi Anda';
		$data['css'] = ['formulir_pengaduan.css', 'nav.css', 'base.css'];
		
		$this->view('template/header', $data);
		$this->view('template/nav');
		$this->view('beranda/index');
		$this->view('template/footer');
	}
}