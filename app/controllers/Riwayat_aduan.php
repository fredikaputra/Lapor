<?php

class Riwayat_aduan extends Controller{
	public function index(){
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['webtitle'] = 'Dashboard - Riwayat Aduan';
			$data['css'] = ['riwayat_aduan.css', 'nav.css', 'base.css'];
			$data['controller'] = __CLASS__;
			
			// ambil data masyarakat
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['username'];
			$data['laporan'] = $this->model('Data_model')->laporan('', $_SESSION['masyarakatNIK'], '');
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
			
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('riwayat_aduan/index', $data);
			$this->view('template/footer');
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard/data-aduan');
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
	
	public function detail($idpengaduan){
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['webtitle'] = 'Dashboard - Riwayat Aduan';
			$data['css'] = ['detail_riwayat_aduan.css', 'nav.css', 'base.css'];
			$data['controller'] = __CLASS__;
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
			
			// ambil data masyarakat
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['username'];
			$data['laporan'] = $this->model('Data_model')->laporan($idpengaduan, '', '')[0];
			$data['tanggapan'] = $this->model('Data_model')->tanggapan($idpengaduan);
			
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('riwayat_aduan/detail', $data);
			$this->view('template/footer');
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard/data-aduan');
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
}