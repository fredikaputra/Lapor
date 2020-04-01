<?php

class Beranda extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		$data['css'] = ['beranda.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		if (isset($_SESSION['petugasID'])) { // ambil data petugas (untuk nav)
			$data['petugas'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
		}else if (isset($_SESSION['masyarakatNIK'])) { // ambil data masyarakat (untuk nav)
			$data['masyarakat'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('beranda');
		$this->view('template/footer');
	}
}