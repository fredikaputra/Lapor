<?php

class Beranda extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		$data['css'] = ['beranda.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		if (isset($_SESSION['petugasID'])) { // ambil data petugas (untuk nav)
			$data['name'] = $this->model('Data_model')->petugas()[0]['nama_petugas'];
			$data['username'] = $this->model('Data_model')->petugas()[0]['username'];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
		}else if (isset($_SESSION['masyarakatNIK'])) { // ambil data masyarakat (untuk nav)
			$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('beranda');
		$this->view('template/footer');
	}
}