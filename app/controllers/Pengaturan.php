<?php

class Pengaturan extends Controller{
	public function index(){
		$data['webtitle'] = 'Laporan! - Pengaturan';
		$data['css'] = ['pengaturan.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		if (isset($_SESSION['masyarakatNIK'])) { // ambil data masyarakat (nav)
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['username'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/login');
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('pengaturan/index', $data);
		$this->view('template/footer');
	}
}