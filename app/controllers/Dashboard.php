<?php

class Dashboard extends Controller{	
	public function index(){
		if (isset($_SESSION['petugasID'])) {
			$data['webtitle'] = 'Dashboard';
			$data['css'] = ['pet_header.css', 'pet_dashboard.css', 'base.css'];
			$data['name'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['nama_petugas'];
			$data['privilege'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['level'];
			$data['phone'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['telp'];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			$data['history'] = $this->model('Data_model')->laporan('', '4');
			$data['activelink'] = 'dashboard';
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/pet_dashboard', $data);
			$this->view('template/footer');
		}else {
			header('location: ' . BASEURL . '/dashboard/riwayat_aduan');
		}
	}
	
	public function data_aduan($id = ''){
		if (isset($_SESSION['petugasID'])) {
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			$data['name'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['nama_petugas'];
			$data['privilege'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['level'];
			$data['activelink'] = 'dataaduan';
			if ($id == '') {
				$data['webtitle'] = 'Dashboard - Data Aduan';
				$data['css'] = ['pet_header.css', 'pet_data_aduan.css', 'base.css'];
				$data['data_aduan'] = $this->model('Data_model')->laporan('', '10');
				
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/pet_data_aduan', $data);
				$this->view('template/footer');
			}else if ($id){
				$data['id'] = $id;
				$data['webtitle'] = 'Data Aduan ' . $data['id'];
				$data['css'] = ['pet_header.css', 'pet_data_aduan_single.css', 'base.css'];
				$data['data_aduan'] = $this->model('Data_model')->laporan($data['id']);
				$data['comment'] = $this->model('Data_model')->tanggapan($data['id']);
				
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/pet_data_aduan_single', $data);
				$this->view('template/footer');
			}
		}else {
			header('location: ' . BASEURL . '/dashboard/riwayat_aduan');
		}
	}
	
	public function riwayat_aduan(){
		$data['webtitle'] = 'Dashboard - Riwayat Aduan';
		$data['css'] = ['mas_riwayat_aduan.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		if (isset($_SESSION['petugasID'])) { // ambil data petugas (nav)
			$data['name'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['nama_petugas'];
			$data['username'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['username'];
		}elseif (isset($_SESSION['masyarakatNIK'])) { // ambil data masyarakat (nav)
			$data['name'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['username'];
			$data['report'] = $this->model('Data_model')->laporan($_SESSION['masyarakatNIK']);
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('dashboard/mas_riwayat_aduan', $data);
		$this->view('template/footer');
	}
	
	public function update_profile(){
		$this->model('UpdateProfile_model')->update($_POST, $_FILES);
		header('location: ' . BASEURL . '/dashboard');
	}
	
	public function report_response($id){
		$this->model('ReportResponse_model')->proccess($_POST, $id);
		header('location: ' . BASEURL . '/dashboard/data-aduan/' . $id);
	}
}