<?php

class Riwayat_aduan extends Controller{
	public function index(){
		$data['webtitle'] = 'Dashboard - Riwayat Aduan';
		$data['css'] = ['mas_riwayat_aduan.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		if (isset($_SESSION['masyarakatNIK'])) { // ambil data masyarakat (nav)
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['username'];
			$data['laporan'] = $this->model('Data_model')->laporan($_SESSION['masyarakatNIK']);
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/login');
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('riwayat_aduan/index', $data);
		$this->view('template/footer');
	}
	
	public function detail($id){
		$data['webtitle'] = 'Dashboard - Riwayat Aduan';
		$data['css'] = ['mas_riwayat_aduan_single.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		if (isset($_SESSION['masyarakatNIK'])) { // ambil data masyarakat (nav)
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['username'];
			$data['laporan'] = $this->model('Data_model')->laporan('', $id);
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/login');
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('riwayat_aduan/detail', $data);
		$this->view('template/footer');
	}
}