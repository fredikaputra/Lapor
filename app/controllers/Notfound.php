<?php

class Notfound extends Controller{
	public function index(){
		
		// deklarasikan variable
		// untuk dikirimkan ke halaman website
		$data['webtitle'] = '404 - Halaman tidak ditemukan!';
		$data['css'] = ['notfound.css', 'base.css'];
		
		// tampilkan website
		// kirim semua data ($data) ke dalam website
		$this->view('template/header', $data);
		$this->view('page/notfound');
		$this->view('template/footer');
	}
}