<?php

class Beranda extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		$data['css'] = ['beranda.css', 'nav.css', 'base.css'];
		
		$this->view('template/header', $data);
		$this->view('template/nav');
		$this->view('beranda/index');
		$this->view('template/footer');
	}
}