<?php

class Dashboard extends Controller{
	public function index(){
		if (isset($_SESSION['petugasID'])) {
			$data['webtitle'] = 'Dashboard';
			$data['css'] = ['dashboard_header.css', 'dashboard.css', 'base.css'];
			$data['js'] = ['detectInputChange.js'];
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas()[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			$data['laporan'] = $this->model('Data_model')->laporan(NULL, NULL, '5');
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/index', $data);
			$this->view('template/footer', $data);
		}else {
			$this->kunci();
		}
	}
	
	public function data_aduan($idpengaduan = NULL, $option = NULL){
		if (isset($_SESSION['petugasID'])) {
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas()[0];
			
			if ($idpengaduan == NULL) { // tampilkan semua data aduan
				$data['webtitle'] = 'Dashboard - Data Aduan';
				$data['css'] = ['dashboard_header.css', 'data_aduan.css', 'base.css'];
				
				// ambil data
				$data['laporan'] = $this->model('Data_model')->laporan();
				
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/data_aduan', $data);
				$this->view('template/footer');
			}else { // tampilkan satu data aduan
				$data['laporan'] = $this->model('Data_model')->laporan($idpengaduan, '', '')[0];
				
				if ($data['laporan'] != NULL) {
					$data['idpengaduan'] = $idpengaduan;
					$data['webtitle'] = 'Data Aduan ' . $data['idpengaduan'];
					$data['css'] = ['dashboard_header.css', 'detail_aduan.css', 'base.css'];
					
					if ($option == 'print') {
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
					$this->data_aduan();
				}
			}
		}else {
			$this->kunci();
		}
	}
	
	public function pengguna($filter = NULL){
		if (isset($_SESSION['petugasID'])) {
			if ($filter == NULL) {
				$data['webtitle'] = 'Dashboard - Pengguna';
				$data['css'] = ['dashboard_header.css', 'pengguna.css', 'base.css'];
				$data['method'] = __FUNCTION__;
				
				// ambil data
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['pengguna'] = $this->model('Data_model')->pengguna();
				$data['users'] = $this->model('Data_model')->pengguna('count');
				
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';
				
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/pengguna', $data);
				$this->view('template/footer', $data);
			}else {
				if (isset($_POST['delete'])) {
					echo 'delete proccess';
				}else if (isset($_POST['search'])) {
					$data['webtitle'] = 'Dashboard - Pengguna';
					$data['css'] = ['dashboard_header.css', 'pengguna.css', 'base.css'];
					$data['method'] = __FUNCTION__;
					
					// ambil data
					$data['petugas'] = $this->model('Data_model')->petugas()[0];
					$data['pengguna'] = $this->model('PenggunaProccess_model')->search();
					$data['users'] = $this->model('Data_model')->pengguna('count');
					
					$data['photo'] = $_SESSION['petugasID'] . '.jpg';
					$data['searchactive'] = true;
					
					$this->view('template/header', $data);
					$this->view('dashboard/header', $data);
					$this->view('dashboard/pengguna', $data);
					$this->view('template/footer', $data);
				}else if (isset($_POST['filter'])) {
					if ($this->model('PenggunaProccess_model')->filter() != NULL) {						
						$data['webtitle'] = 'Dashboard - Pengguna';
						$data['css'] = ['dashboard_header.css', 'pengguna.css', 'base.css'];
						$data['method'] = __FUNCTION__;
						
						// ambil data
						$data['petugas'] = $this->model('Data_model')->petugas()[0];
						$data['pengguna'] = $this->model('PenggunaProccess_model')->filter();
						$data['users'] = $this->model('Data_model')->pengguna('count');
						
						$data['photo'] = $_SESSION['petugasID'] . '.jpg';
						
						$this->view('template/header', $data);
						$this->view('dashboard/header', $data);
						$this->view('dashboard/pengguna', $data);
						$this->view('template/footer', $data);
					}
				}else {
					$this->pengguna();
				}
			}
		}else {
			$this->kunci();
		}
	}
	
	public function tambah_pengguna($user = NULL){
		if (isset($_SESSION['petugasID'])) {
			if ($user == 'petugas') {
				$data['webtitle'] = 'Dashboard - Tambah Pengguna Sebagai Petugas';
				$data['css'] = ['dashboard_header.css', 'form_tambah_petugas.css', 'base.css'];
				$data['js'] = ['unsetload.js'];
				$data['method'] = __FUNCTION__;
				
				// ambil data
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
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
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
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
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';
				
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/tambah_pengguna', $data);
				$this->view('template/footer', $data);
			}
		}else {
			$this->kunci();
		}
	}
	
	public function kunci(){
		$data['webtitle'] = 'Dashboard - Terkunci';
		$data['css'] = ['lockscreen.css', 'base.css'];
		
		// ambil data
		if (!isset($_SESSION['onLock'])) {
			$_SESSION['onLock'] = [
				'username' => $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['username'],
				'name' => $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['nama_petugas'],
				'photo' => $_SESSION['petugasID'] . '.jpg'
			];
		}
		
		if (isset($_SESSION['petugasID'])) {
			unset($_SESSION['petugasID']);
		}
		
		$this->view('template/header', $data);
		$this->view('dashboard/lockscreen', $data);
		$this->view('template/footer');
	}
	
	public function update_profile(){
		if (isset($_SESSION['petugasID'])) {
			$this->model('UpdateProfile_model')->update();
			header('location: ' . BASEURL . '/dashboard');
		}else {
			$this->kunci();
		}
	}
	
	public function report_response($idpengaduan = NULL){
		if (isset($_SESSION['petugasID'])) {
			if ($idpengaduan != NULL) {
				$this->model('ReportResponse_model')->proccess($idpengaduan);
				header('location: ' . BASEURL . '/dashboard/data-aduan/' . $idpengaduan);
			}else {
				$this->index();
			}
		}else {
			$this->kunci();
		}
	}
	
	public function proccess_tambah_pengguna($user = NULL){
		if (isset($_SESSION['petugasID'])) {
			if ($user != NULL) {
				if ($user == 'petugas') {
					if ($this->model('Daftar_model')->petugas() == TRUE) {
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
				}else {
					$this->index();
				}
			}else {
				$this->index();
			}
		}else {
			$this->kunci();
		}
	}
}