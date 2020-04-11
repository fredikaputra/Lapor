<?php

class Notfound extends Controller{
	public function index(){
		// deklarasikan data
		$data['webtitle'] = '404 - Halaman tidak ditemukan!';
		$data['css'] = ['notfound.css', 'base.css'];
		
		// tampilkan website serta kirim data nya ke view
		$this->view('template/header', $data);
		$this->view('page/notfound');
		$this->view('template/footer');
	}
}