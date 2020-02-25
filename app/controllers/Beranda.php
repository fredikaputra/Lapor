<?php

class Beranda extends Controller{
	public function index(){
		$data['title'] = 'Lapor! - Layanan Pengaduan Masyarakat Online';
		$data['css'] = 'beranda.css';
		
		$this->view('template/head', $data);
		$this->view('beranda/index');
		$this->view('template/foot');
	}
}