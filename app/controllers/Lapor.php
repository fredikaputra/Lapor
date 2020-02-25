<?php

class Lapor extends Controller{
	public function index(){
		$data['title'] = 'Lapor! - Sampaikan Aspirasi Anda';
		$data['css'] = 'lapor.css';
		
		$this->view('template/head', $data);
		$this->view('lapor/index');
		$this->view('template/foot');
	}
}