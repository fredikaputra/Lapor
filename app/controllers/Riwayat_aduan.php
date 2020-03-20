<?php

class Riwayat_aduan extends Controller{
	public function index(){
		if (isset($_SESSION['masyarakatNIK'])) {
			// buat data untuk di kirim ke view()
			$data['webtitle'] = 'Dashboard';
			$data['css'] = ['base.css', 'nav.css', 'dashboard_masyarakat.css'];
			$data['report'] = $this->model('Data_model')->report($_SESSION['masyarakatNIK']);
			
			$this->view('template/header', $data);
			$this->view('template/nav');
			$this->view('riwayat/index', $data);
			$this->view('template/footer');
		}else { // kalau masyarakat belum login
			Flasher::setFlash('Silahkan untuk login terlebih dahulu!', 'bg-info', 'warning.png');
			header('location: ' . BASEURL . '/login');
		}
	}
}