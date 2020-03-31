<?php

class Beranda extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		$data['css'] = ['beranda.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		if (isset($_SESSION['petugasID'])) { // ambil data petugas (nav)
			$data['name'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['nama_petugas'];
			$data['username'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['username'];
		}elseif (isset($_SESSION['masyarakatNIK'])) { // ambil data masyarakat (nav)
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['username'];
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('beranda');
		$this->view('template/footer');
	}
}