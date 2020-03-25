<?php

class Beranda extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		$data['css'] = ['beranda.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('beranda');
		$this->view('template/footer');
	}
}