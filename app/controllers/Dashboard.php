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
			$data['laporan'] = $this->model('Data_model')->laporan($data['idpengaduan'], '', '')[0];
			if ($data['laporan'] != NULL) {
				$data['webtitle'] = 'Data Aduan ' . $data['idpengaduan'];
				$data['css'] = ['dashboard_header.css', 'detail_aduan.css', 'base.css'];
				if ($print == 'print') {
					$data['js'] = ['print.js', 'directprint.js'];
				}else {
					$data['js'] = ['print.js'];
				}
				
				// ambil data
				$data['tanggapan'] = $this->model('Data_model')->tanggapan($data['idpengaduan']);
				
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/detail_aduan', $data);
				$this->view('template/footer', $data);
			}else{
				header('location: ' . BASEURL . '/dashboard/data-aduan');
			}
		}
	}
	
	public function pengguna(){
		$data['webtitle'] = 'Dashboard - Pengguna';
		$data['css'] = ['dashboard_header.css', 'pengguna.css', 'base.css'];
		$data['method'] = __FUNCTION__;
		
		// ambil data
		$data['petugas'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0];
		$data['pengguna'] = $this->model('Data_model')->pengguna();
		$data['users'] = $this->model('Data_model')->pengguna('count');
		
		$data['photo'] = $_SESSION['petugasID'] . '.jpg';
		
		$this->view('template/header', $data);
		$this->view('dashboard/header', $data);
		$this->view('dashboard/pengguna', $data);
		$this->view('template/footer', $data);
	}
	
	public function tambah_pengguna($user = ''){
		if ($user == 'petugas') {
			$data['webtitle'] = 'Dashboard - Tambah Pengguna Sebagai Petugas';
			$data['css'] = ['dashboard_header.css', 'form_tambah_petugas.css', 'base.css'];
			$data['js'] = ['unsetload.js'];
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/form_tambah_petugas', $data);
			$this->view('template/footer', $data);
		}else if($user == 'masyarakat'){
			$data['webtitle'] = 'Dashboard - Tambah Pengguna Sebagai Masyarakat';
			$data['css'] = ['dashboard_header.css', 'form_tambah_masyarakat.css', 'base.css'];
			$data['js'] = ['unsetload.js'];
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/form_tambah_masyarakat', $data);
			$this->view('template/footer', $data);
		}else{
			$data['webtitle'] = 'Dashboard - Tambah Pengguna';
			$data['css'] = ['dashboard_header.css', 'tambah_pengguna.css', 'base.css'];
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas($_SESSION['petugasID'])[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/tambah_pengguna', $data);
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
	
	public function proccess_tambah_pengguna($user){
		if ($user == 'petugas') {
			if ($this->model('Daftar_model')->petugas($_POST, $_FILES) == TRUE) {
				header('location: ' . BASEURL . '/dashboard/pengguna');
			}else {
				header('location: ' . BASEURL . '/dashboard/tambah-pengguna/petugas');
			}
		}else if ($user == 'masyarakat') {
			if ($this->model('Daftar_model')->masyarakat($_POST, $_FILES) == TRUE) {
				header('location: ' . BASEURL . '/dashboard/pengguna');
			}else {
				header('location: ' . BASEURL . '/dashboard/tambah-pengguna/masyarakat');
			}
		}
	}
}