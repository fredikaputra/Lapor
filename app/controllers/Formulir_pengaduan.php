<?php

class Formulir_pengaduan extends Controller{
	public function index(){
		$data['webtitle'] = 'LAPOR! - Sampaikan Aspirasi Anda';
		$data['css'] = ['formulir_pengaduan.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		if (isset($_SESSION['petugasID'])) { // ambil data petugas (nav)
			$data['name'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['nama_petugas'];
			$data['username'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['username'];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
		}else if (isset($_SESSION['masyarakatNIK'])) { // ambil data masyarakat (nav)
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['username'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
		}else {
			Flasher::setFlash(NULL, 'Silahkan login terlebih dahulu untuk melapor!', 'warning', 'warning');
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('formulir_pengaduan/index');
		$this->view('template/footer');
	}
	
	public function upload(){
		$this->model('FormulirPengaduan_model')->upload($_POST, $_FILES);
		header('location: ' . BASEURL . '/formulir-pengaduan');
	}
}