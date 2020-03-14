<?php

class Dashboard extends Controller{
	public function index(){
		if (isset($_SESSION['petugasID'])) {
			$data['css'] = ['base.css', 'dashboard.css'];
			$data['title'] = 'Dashboard';
			$data['js'] = ['outline.js'];
			$data['name'] = $this->model('GetData_model')->petugas($_SESSION['petugasID'])['nama_petugas'];
			$data['level'] = ucfirst($this->model('GetData_model')->petugas($_SESSION['petugasID'])['level']);
			$data['dashboardtitle'] = 'Dashboard';
			$data['breadcrumbs'] = 'Lapor / ';
			$data['link'] = '<a href="' . BASEURL . '/dashboard">Dashboard</a>';
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/index', $data);
			$this->view('dashboard/footer', $data);
		}else {
			$this->user_locked();
		}
	}
	
	public function data_pengaduan(){
		if (isset($_SESSION['petugasID'])) {
			$data['css'] = ['base.css', 'dashboard.css', 'datapengaduan.css'];
			$data['title'] = 'Dashboard';
			$data['js'] = ['outline.js'];
			$data['name'] = $this->model('GetData_model')->petugas($_SESSION['petugasID'])['nama_petugas'];
			$data['level'] = ucfirst($this->model('GetData_model')->petugas($_SESSION['petugasID'])['level']);
			$data['dashboardtitle'] = 'Data Pengaduan';
			$data['breadcrumbs'] = 'Lapor / Dashboard /';
			$data['link'] = '<a href="' . BASEURL . '/dashboard/data-pengaduan">Data Pengaduan</a>';
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/datapengaduan', $data);
			$this->view('dashboard/footer', $data);
		}else {
			$this->user_locked();
		}
	}
	
	public function user_locked(){
		if (!isset($_SESSION['petugasUsername'])) {
			$_SESSION['petugasName'] = $this->model('GetData_model')->petugas($_SESSION['petugasID'])['nama_petugas'];
			$_SESSION['petugasUsername'] = $this->model('GetData_model')->petugas($_SESSION['petugasID'])['username'];
			unset($_SESSION['petugasID']);
		}
		
		$data['nickname'] = $this->model('Nickname_model')->getName($_SESSION['petugasName']);
		$data['title'] = 'Locked';
		$data['css'] = ['base.css', 'lockscreen.css'];
		$data['js'] = ['outline.js'];
		
		$this->view('template/header', $data);
		$this->view('dashboard/lockscreen', $data);
	}
	
	public function masyarakat($masyarakat = NULL){
		if ($masyarakat === NULL) {
			echo 'tidak ada';
		}else {
			$data['title'] = $this->model('GetData_model')->autoMasyarakat()['nama'];
			$data['css'] = ['base.css', 'topnav.css', 'masyarakat.css'];
			$data['js'] = ['outline.js', 'modal.js'];
			$data['modalsignup'] = 'hide';
			$data['modalsignin'] = 'hide';
			$data['name'] = $this->model('GetData_model')->autoMasyarakat()['nama'];
			$data['username'] = $this->model('GetData_model')->autoMasyarakat()['username'];
			
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('dashboard/masyarakat', $data);
			$this->view('template/footer', $data);
		}
	}
	
	public function riwayat_aduan($riwayat = NULL){
		if ($riwayat === NULL) {
			echo 'tidak ada';
		}else {
			$data['title'] = 'Riwayat Aduan #0798';
			$data['css'] = ['base.css', 'topnav.css', 'riwayataduan.css'];
			$data['js'] = ['outline.js', 'modal.js'];
			$data['modalsignup'] = 'hide';
			$data['modalsignin'] = 'hide';
			$data['name'] = $this->model('GetData_model')->autoMasyarakat()['nama'];
			$data['username'] = $this->model('GetData_model')->autoMasyarakat()['username'];
			
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('dashboard/riwayataduan', $data);
			$this->view('template/footer', $data);
		}
	}
}