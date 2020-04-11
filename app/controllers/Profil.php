<?php

class Profil extends Controller{
	public function index(){
		if (isset($_SESSION['masyarakatNIK'])) {
			// deklarasikan data
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
			$this->view('profil/index', $data);
			$this->view('template/footer');
		}else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}else {
			header('location: ' . BASEURL . '/login');
		}
	}
	
	public function ubah($option = NULL){
		if ($option == 'nama') {
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
				$this->view('profil/nama', $data);
				$this->view('template/footer', $data);
			}else if (isset($_SESSION['petugasID'])) {
				header('location: ' . BASEURL . '/dashboard');
			}else {
				header('location: ' . BASEURL . '/login');
			}
		}else if ($option == 'username') {
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
				$this->view('profil/username', $data);
				$this->view('template/footer', $data);
			}else if (isset($_SESSION['petugasID'])) {
				header('location: ' . BASEURL . '/dashboard');
			}else {
				header('location: ' . BASEURL . '/login');
			}
		}else if ($option == 'telepon') {
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
				$this->view('profil/phone', $data);
				$this->view('template/footer', $data);
			}else if (isset($_SESSION['petugasID'])) {
				header('location: ' . BASEURL . '/dashboard');
			}else {
				header('location: ' . BASEURL . '/login');
			}
		}else if ($option == 'foto-profil') {
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
				$this->view('profil/foto_profil', $data);
				$this->view('template/footer');
			}else if (isset($_SESSION['petugasID'])) {
				header('location: ' . BASEURL . '/dashboard');
			}else {
				header('location: ' . BASEURL . '/login');
			}
		}
	}
	
	public function proccess($update = NULL){
		if ($update != NULL) {
			if ($update == 'nama') {
				$this->model('Update_model')->masyarakat('name');
				header('location: ' . BASEURL . '/profil/ubah/nama');
			}else if ($update == 'username') {
				$this->model('Setting_model')->username();
				header('location: ' . BASEURL . '/profil/ubah/username');
			}else if ($update == 'phone') {
				$this->model('Setting_model')->phone();
				header('location: ' . BASEURL . '/profil/ubah/telepon');
			}else if ($update == 'photo') {
				$this->model('Setting_model')->photo();
				header('location: ' . BASEURL . '/profil/ubah/foto-profil');
			}else {
				$this->index();
			}
		}else {
			$this->index();
		}
	}
}