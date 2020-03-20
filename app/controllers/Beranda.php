<?php

class Beranda extends Controller{
	public function index(){
		// buat data untuk di kirim ke view()
		$data['css'] = ['base.css', 'beranda.css', 'nav.css'];
		$data['webtitle'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])['username'];
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('beranda/index', $data);
		$this->view('template/footer', $data);
	}
}