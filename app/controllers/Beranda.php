<?php

class Beranda extends Controller{
	public function index(){
		$data['title'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		$data['css'] = ['base.css', 'beranda.css', 'topnav.css'];
		$data['js'] = ['outline.js', 'modal.js'];
		$data['modalsignin'] = 'hide';
		$data['modalsignup'] = 'hide';
		$data['modalgotodash'] = 'hide';
		
		$this->view('template/header', $data);
		$this->view('template/nav');
		$this->view('beranda/index');
		$this->view('template/footer', $data);
	}
}