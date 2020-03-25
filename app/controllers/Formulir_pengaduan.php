<?php

class Formulir_pengaduan extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Sampaikan Aspirasi Anda';
		$data['css'] = ['formulir_pengaduan.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('formulir_pengaduan/index');
		$this->view('template/footer');
	}
}