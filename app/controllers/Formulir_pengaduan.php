<?php

class Formulir_pengaduan extends Controller{
	public function index(){
		// buat data untuk di kirim ke view()
		$data['css'] = ['base.css', 'formulir_pengaduan.css'];
		$data['webtitle'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		
		if (isset($_SESSION['msg'])) {
			$data['js'] = ['confirmLeave.js'];
		}
		
		if (!isset($_SESSION['masyarakatNIK'])) { // cek kalau user belum login
			Flasher::setFlash('Silahkan login terlebih dahulu untuk membuat laporan!', 'bg-info', 'warning.png'); // tampilkan alert 'login terlebih dahulu' supaya bisa buat laporan
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav');
		$this->view('formulir_pengaduan/index');
		$this->view('template/footer', $data);
	}
	
	public function proccess(){
		$this->model('UploadPengaduan_model')->send($_POST, $_FILES);
		header('location: ' . BASEURL . '/formulir-pengaduan');
	}
}