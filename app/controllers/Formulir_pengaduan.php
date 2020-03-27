<?php

class Formulir_pengaduan extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Sampaikan Aspirasi Anda';
		$data['css'] = ['formulir_pengaduan.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		if (isset($_SESSION['petugasID'])) {
			$data['name'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0][1];
			$data['username'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0][2];
		}elseif (isset($_SESSION['masyarakatNIK'])) {
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0][1];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0][2];
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('formulir_pengaduan/index');
		$this->view('template/footer');
	}
}