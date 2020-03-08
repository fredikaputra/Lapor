<?php

class Beranda extends Controller{
	public function index(){
		$data['title'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		$data['css'] = ['base.css', 'beranda.css'];
		$data['js'] = ['outline.js'];
		$data['modalsignin'] = 'hide';
		$data['modalsignup'] = 'hide';
		
		$this->view('template/header', $data);
		$this->view('beranda/index');
		$this->view('template/footer', $data);
	}
}