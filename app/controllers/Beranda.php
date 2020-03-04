<?php

class Beranda extends Controller{
	public function index(){
		$data['title'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		$data['css'] = ['base.css', 'beranda.css'];
		
		$this->view('template/header', $data);
		$this->view('beranda/index');
		$this->view('template/footer');
	}
}