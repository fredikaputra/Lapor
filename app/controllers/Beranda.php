<?php

class Beranda extends Controller{
	public function index(){
		// set data value
		$data['css'] = 'beranda.css';
		$data['title'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		
		// use view
		$this->view('template/header', $data);
		$this->view('beranda/index');
		$this->view('template/footer');
	}
}