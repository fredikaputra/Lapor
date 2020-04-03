<?php

class Pengaturan extends Controller{
	public function index(){
		$data['webtitle'] = 'Laporan! - Pengaturan';
		$data['css'] = ['pengaturan.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		if (isset($_SESSION['masyarakatNIK'])) { // ambil data masyarakat (nav)
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['username'];
			$data['nik'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nik'];
			$data['phone'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['telp'];
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
	
	public function nama(){
		$data['webtitle'] = 'Laporan! - Pengaturan';
		$data['css'] = ['detail_pengaturan.css', 'nav.css', 'base.css'];
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
		$this->view('pengaturan/nama', $data);
		$this->view('template/footer');
	}
	
	public function username(){
		$data['webtitle'] = 'Laporan! - Pengaturan';
		$data['css'] = ['detail_pengaturan.css', 'nav.css', 'base.css'];
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
		$this->view('pengaturan/username', $data);
		$this->view('template/footer');
	}
	
	public function telepon(){
		$data['webtitle'] = 'Laporan! - Pengaturan';
		$data['css'] = ['detail_pengaturan.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		if (isset($_SESSION['masyarakatNIK'])) { // ambil data masyarakat (nav)
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['username'];
			$data['phone'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['telp'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/login');
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('pengaturan/phone', $data);
		$this->view('template/footer');
	}
	
	public function foto_profil(){
		$data['webtitle'] = 'Laporan! - Pengaturan';
		$data['css'] = ['detail_pengaturan.css', 'nav.css', 'base.css'];
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
		$this->view('pengaturan/foto_profil', $data);
		$this->view('template/footer');
	}
	
	public function proccess($setting){
		if ($setting == 'nama') {
			$this->model('Setting_model')->name($_POST);
			header('location: ' . BASEURL . '/pengaturan/nama');
		}else if ($setting == 'username') {
			$this->model('Setting_model')->username($_POST);
			header('location: ' . BASEURL . '/pengaturan/username');
		}else if ($setting == 'phone') {
			$this->model('Setting_model')->phone($_POST);
			header('location: ' . BASEURL . '/pengaturan/telepon');
		}else if ($setting == 'photo') {
			$this->model('Setting_model')->photo($_POST, $_FILES);
			header('location: ' . BASEURL . '/pengaturan/foto-profil');
		}
	}
}