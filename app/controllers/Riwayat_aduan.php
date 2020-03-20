<?php

class Riwayat_aduan extends Controller{
	public function index(){
		if (isset($_SESSION['masyarakatNIK'])) {
			// buat data untuk di kirim ke view()
			$data['webtitle'] = 'Dashboard';
			$data['css'] = ['base.css', 'nav.css', 'riwayat.css'];
			$data['report'] = $this->model('Data_model')->masHistReport($_SESSION['masyarakatNIK']);
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])['username'];
			
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('riwayat/index', $data);
			$this->view('template/footer');
		}else { // kalau masyarakat belum login
			Flasher::setFlash('Silahkan untuk login terlebih dahulu!', 'bg-info', 'warning.png');
			header('location: ' . BASEURL . '/login');
		}
	}
}