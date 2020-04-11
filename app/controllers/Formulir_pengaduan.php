<?php

class Formulir_pengaduan extends Controller{
	public function index(){
		// deklarasikan data
		$data['webtitle'] = 'LAPOR! - Sampaikan Aspirasi Anda';
		$data['css'] = ['formulir_pengaduan.css', 'nav.css', 'base.css'];
		$data['js'] = ['unsetload.js'];
		$data['controller'] = __CLASS__;
		
		if (isset($_SESSION['petugasID'])) {
			// ambil data petugas jika yang login petugas
			$data['name'] = $this->model('Data_model')->petugas()[0]['nama_petugas'];
			$data['username'] = $this->model('Data_model')->petugas()[0]['username'];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
		}else if (isset($_SESSION['masyarakatNIK'])) {
			// ambil data masyarakat jika yang login masyarakat
			$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
		}else { // jika masyarakat belum login
			Flasher::setFlash(NULL, 'Silahkan login terlebih dahulu untuk melapor!', 'info', 'warning');
		}
		
		// tampilkan website serta kirim data nya ke view
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('formulir_pengaduan/index');
		$this->view('template/footer', $data);
	}
	
	// bagian proses
	public function upload(){
		$this->model('FormulirPengaduan_model')->upload();
		header('location: ' . BASEURL . '/formulir-pengaduan');
	}
}