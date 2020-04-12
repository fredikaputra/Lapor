<?php

class Formulir_pengaduan extends Controller{
	public function index(){
		
		// deklarasikan variable
		// untuk dikirimkan ke halaman website
		$data['webtitle'] = 'LAPOR! - Sampaikan Aspirasi Anda';
		$data['css'] = ['formulir_pengaduan.css', 'nav.css', 'base.css'];
		$data['js'] = ['unsetload.js'];
		$data['controller'] = __CLASS__;
		
		// ambil data pengguna
		// cek data pengguna berdasarkan session
		// ambil data petugas jika id petugas dikenali
		if (isset($_SESSION['petugasID'])) {
			$data['name'] = $this->model('Data_model')->petugas()[0]['nama_petugas'];
			$data['username'] = $this->model('Data_model')->petugas()[0]['username'];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
		}
		
		// cek data pengguna berdasarkan session
		// ambil data masyarakat jika nik masyarakat dikenali
		else if (isset($_SESSION['masyarakatNIK'])) {
			$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
		}
		
		// jika masyarakat belum login
		// tampilkan notifikasi perintah untuk login
		else {
			Flasher::setFlash(NULL, 'Silahkan login terlebih dahulu untuk melapor!', 'info', 'warning');
		}
		
		// tampilkan website
		// kirim semua data ($data) ke dalam website
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('formulir_pengaduan/index');
		$this->view('template/footer', $data);
	}
	
	// proses upload formulir pengaduan
	public function proses(){
		$this->model('FormulirPengaduan_model')->upload();
		header('location: ' . BASEURL . '/formulir-pengaduan');
	}
}