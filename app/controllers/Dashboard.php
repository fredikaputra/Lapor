<?php

class Dashboard extends Controller{
	public function index(){
		$data['webtitle'] = 'Dashboard';
		$data['css'] = ['dashboard_header.css', 'dashboard.css', 'base.css'];
		$data['js'] = ['detectInputChange.js'];
		$data['method'] = __FUNCTION__;
		
		// ambil data
		$data['petugas'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0];
		$data['photo'] = $_SESSION['petugasID'] . '.jpg';
		$data['laporan'] = $this->model('Data_model')->laporan('', '', '5');
		
		$this->view('template/header', $data);
		$this->view('dashboard/header', $data);
		$this->view('dashboard/index', $data);
		$this->view('template/footer', $data);
	}
	
	public function data_aduan($idpengaduan = '', $print = FALSE){
		$data['photo'] = $_SESSION['petugasID'] . '.jpg';
		$data['method'] = __FUNCTION__;
		
		// ambil data
		$data['petugas'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0];
		
		if ($idpengaduan == '') { // tampilkan semua data aduan
			$data['webtitle'] = 'Dashboard - Data Aduan';
			$data['css'] = ['dashboard_header.css', 'data_aduan.css', 'base.css'];
			
			// ambil data
			$data['laporan'] = $this->model('Data_model')->laporan();
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/data_aduan', $data);
			$this->view('template/footer');
		}else { // tampilkan satu data aduan
			$data['idpengaduan'] = $idpengaduan;
			$data['webtitle'] = 'Data Aduan ' . $data['idpengaduan'];
			$data['css'] = ['dashboard_header.css', 'detail_aduan.css', 'base.css'];
			if ($print == 'print') {
				$data['js'] = ['print.js', 'directprint.js'];
			}else {
				$data['js'] = ['print.js'];
			}
			
			// ambil data
			$data['laporan'] = $this->model('Data_model')->laporan($data['idpengaduan'], '', '');
			$data['tanggapan'] = $this->model('Data_model')->tanggapan($data['idpengaduan']);
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/detail_aduan', $data);
			$this->view('template/footer', $data);
		}
	}
	
	public function update_profile(){
		$this->model('UpdateProfile_model')->update($_POST, $_FILES);
		header('location: ' . BASEURL . '/dashboard');
	}
	
	public function report_response($idpengaduan){
		$this->model('ReportResponse_model')->proccess($_POST, $idpengaduan);
		header('location: ' . BASEURL . '/dashboard/data-aduan/' . $idpengaduan);
	}
}