<?php

class Dashboard extends Controller{	
	public function index(){
		if (isset($_SESSION['petugasID'])) {
			$data['webtitle'] = 'Dashboard';
			$data['css'] = ['mas_riwayat_aduan.css', 'nav.css', 'base.css'];
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
			$this->view('dashboard/mas_riwayat_aduan');
			$this->view('template/footer');
		}else {
			header('location: ' . BASEURL . '/dashboard/riwayat_aduan');
		}
	}
	
	public function riwayat_aduan(){
		$data['webtitle'] = 'Dashboard - Riwayat Aduan';
		$data['css'] = ['mas_riwayat_aduan.css', 'nav.css', 'base.css'];
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
		$this->view('dashboard/mas_riwayat_aduan');
		$this->view('template/footer');
	}
}