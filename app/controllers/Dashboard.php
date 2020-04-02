<?php

class Dashboard extends Controller{	
	public function index(){
		if (isset($_SESSION['petugasID'])) { // yang login petugas
			$data['webtitle'] = 'Dashboard';
			$data['css'] = ['pet_header.css', 'pet_dashboard.css', 'base.css'];
			$data['js'] = ['detectInputChange.js'];
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			$data['laporan'] = $this->model('Data_model')->laporan('', '4');
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/pet_dashboard', $data);
			$this->view('template/footer', $data);
		}else { // kalau yang login bukan petugas
			header('location: ' . BASEURL . '/dashboard/riwayat_aduan');
		}
	}
	
	public function data_aduan($id = ''){
		if (isset($_SESSION['petugasID'])) { // yang login petugas
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0];
			
			if ($id == '') { // tampilkan semua data aduan
				$data['webtitle'] = 'Dashboard - Data Aduan';
				$data['css'] = ['pet_header.css', 'pet_data_aduan.css', 'base.css'];
				
				// ambil data
				$data['laporan'] = $this->model('Data_model')->laporan('', '10');
				
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/pet_data_aduan', $data);
				$this->view('template/footer');
			}else { // tampilkan satu data aduan
				$data['id'] = $id;
				$data['webtitle'] = 'Data Aduan ' . $data['id'];
				$data['css'] = ['pet_header.css', 'pet_data_aduan_single.css', 'base.css'];
				
				// ambil data
				$data['laporan'] = $this->model('Data_model')->laporan($data['id']);
				$data['tanggapan'] = $this->model('Data_model')->tanggapan($data['id']);
				
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/pet_data_aduan_single', $data);
				$this->view('template/footer');
			}
		}else { // kalau yang login bukan petugas
			header('location: ' . BASEURL . '/dashboard/riwayat_aduan');
		}
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