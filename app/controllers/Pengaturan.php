<?php

class Pengaturan extends Controller{
	public function index(){
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['webtitle'] = 'Laporan! - Pengaturan';
			$data['css'] = ['pengaturan.css', 'nav.css', 'base.css'];
			$data['controller'] = __CLASS__;
			
			// ambil data masyarakat
			$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
			$data['nik'] = $this->model('Data_model')->masyarakat()[0]['nik'];
			$data['phone'] = $this->model('Data_model')->masyarakat()[0]['telp'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
			
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('pengaturan/index', $data);
			$this->view('template/footer');
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
	
	public function nama(){
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['webtitle'] = 'Laporan! - Pengaturan';
			$data['css'] = ['detail_pengaturan.css', 'nav.css', 'base.css'];
			$data['js'] = ['settingDetectInputChange.js'];
			$data['controller'] = __CLASS__;
			
			// ambil data masyarakat
			$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
			
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('pengaturan/nama', $data);
			$this->view('template/footer', $data);
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
	
	public function username(){
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['webtitle'] = 'Laporan! - Pengaturan';
			$data['css'] = ['detail_pengaturan.css', 'nav.css', 'base.css'];
			$data['js'] = ['settingDetectInputChange.js'];
			$data['controller'] = __CLASS__;
			
			// ambil data masyarakat
			$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
			
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('pengaturan/username', $data);
			$this->view('template/footer', $data);
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
	
	public function telepon(){
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['webtitle'] = 'Laporan! - Pengaturan';
			$data['css'] = ['detail_pengaturan.css', 'nav.css', 'base.css'];
			$data['js'] = ['settingDetectInputChange.js'];
			$data['controller'] = __CLASS__;
			
			// ambil data masyarakat
			$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
			$data['phone'] = $this->model('Data_model')->masyarakat()[0]['telp'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
			
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('pengaturan/phone', $data);
			$this->view('template/footer', $data);
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
	
	public function foto_profil(){
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['webtitle'] = 'Laporan! - Pengaturan';
			$data['css'] = ['detail_pengaturan.css', 'nav.css', 'base.css'];
			$data['controller'] = __CLASS__;
			
			// ambil data masyarakat
			$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
			
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('pengaturan/foto_profil', $data);
			$this->view('template/footer');
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
	
	public function proccess($setting = NULL){
		if ($setting != NULL) {
			if ($setting == 'nama') {
				$this->model('Setting_model')->name();
				header('location: ' . BASEURL . '/pengaturan/nama');
			}else if ($setting == 'username') {
				$this->model('Setting_model')->username();
				header('location: ' . BASEURL . '/pengaturan/username');
			}else if ($setting == 'phone') {
				$this->model('Setting_model')->phone();
				header('location: ' . BASEURL . '/pengaturan/telepon');
			}else if ($setting == 'photo') {
				$this->model('Setting_model')->photo();
				header('location: ' . BASEURL . '/pengaturan/foto-profil');
			}else {
				$this->index();
			}
		}else {
			$this->index();
		}
	}
}