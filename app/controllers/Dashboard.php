<?php

class Dashboard extends Controller{
	public function index(){
		if (isset($_SESSION['petugasID'])) {
			$data['webtitle'] = 'Dashboard';
			$data['css'] = ['dashboard_header.css', 'dashboard.css', 'base.css'];
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas()[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			$data['laporan'] = $this->model('Data_model')->laporan(NULL, NULL, '5');
			$data['tableRow'] = [
				'masyarakat' => $this->model('Data_model')->tableRow('masyarakat', NULL, NULL),
				'petugas' => $this->model('Data_model')->tableRow('petugas', NULL, NULL),
				'laporan' => $this->model('Data_model')->tableRow('pengaduan', NULL, NULL),
				'proses' => $this->model('Data_model')->tableRow('pengaduan', NULL, "status = '0'"),
				'selesai' => $this->model('Data_model')->tableRow('pengaduan', NULL, "status = '1'")
			];
			
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/index', $data);
			$this->view('template/footer', $data);
		}else {
			$this->kunci();
		}
	}
	
	public function data_aduan($param1 = NULL, $param2 = NULL){
		if (isset($_SESSION['petugasID'])) {
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas()[0];
			
			if ($param1 == NULL) { // tampilkan semua data aduan
				$data['webtitle'] = 'Dashboard - Data Aduan';
				$data['css'] = ['dashboard_header.css', 'data_aduan.css', 'base.css'];
				
				// ambil data
				$data['laporan'] = $this->model('Data_model')->laporan();
				
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/data_aduan', $data);
				$this->view('template/footer');
			}else if ($param1 != NULL && $param2 == NULL) { // tampilkan satu data aduan
				$data['laporan'] = $this->model('Data_model')->laporan($param1, '', '')[0];
				
				if ($param1 == 'filter') {
					$data['webtitle'] = 'Dashboard - Data Aduan';
					$data['css'] = ['dashboard_header.css', 'data_aduan.css', 'base.css'];
					
					// ambil data
					$data['laporan'] = $this->model('Data_model')->laporanFilter();
					
					$this->view('template/header', $data);
					$this->view('dashboard/header', $data);
					$this->view('dashboard/data_aduan', $data);
					$this->view('template/footer');
				}else if ($data['laporan'] != NULL) {
					$data['idpengaduan'] = $param1;
					$data['webtitle'] = 'Data Aduan ' . $data['idpengaduan'];
					$data['css'] = ['dashboard_header.css', 'detail_aduan.css', 'base.css'];
					
					// ambil data
					$data['tanggapan'] = $this->model('Data_model')->tanggapan($data['idpengaduan']);
					
					$this->view('template/header', $data);
					$this->view('dashboard/header', $data);
					$this->view('dashboard/detail_aduan', $data);
					$this->view('template/footer', $data);
				}else{
					$this->data_aduan();
				}
			}else if ($param1 != NULL && $param2 != NULL) { // tampilkan satu data aduan
				if ($param1 == 'cetak') {
					$data['laporan'] = $this->model('Data_model')->laporan($param2, '', '')[0];
					
					if ($data['laporan'] != NULL) {
						$data['idpengaduan'] = $param2;
						$data['webtitle'] = 'Data Aduan ' . $data['idpengaduan'];
						$data['css'] = ['dashboard_header.css', 'detail_aduan.css', 'base.css'];
						$data['js'] = ['print.js', 'directprint.js'];
						
						// ambil data
						$data['tanggapan'] = $this->model('Data_model')->tanggapan($data['idpengaduan']);
						
						$this->view('template/header', $data);
						$this->view('dashboard/header', $data);
						$this->view('dashboard/detail_aduan', $data);
						$this->view('template/footer', $data);
					}else{
						$this->data_aduan();
					}
				}else if ($param1 == 'hapus') {
					$this->model('Delete_model')->laporan($param2);
					header('location: ' . BASEURL . '/dashboard/data-aduan');
				}else {
					$this->data_aduan();
				}
			}
		}else {
			$this->kunci();
		}
	}
	
	public function pengguna($filter = NULL){
		if (isset($_SESSION['petugasID'])) {
			$data['users'] = $this->model('Data_model')->tableRow('masyarakat', 'petugas', NULL);
			if ($filter == NULL) {
				$data['webtitle'] = 'Dashboard - Pengguna';
				$data['css'] = ['dashboard_header.css', 'pengguna.css', 'base.css'];
				$data['method'] = __FUNCTION__;
				
				// ambil data
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['pengguna'] = $this->model('Data_model')->pengguna();
				
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';
				
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/pengguna', $data);
				$this->view('template/footer', $data);
			}else {
				if (isset($_POST['search'])) {
					$data['webtitle'] = 'Dashboard - Pengguna';
					$data['css'] = ['dashboard_header.css', 'pengguna.css', 'base.css'];
					$data['method'] = __FUNCTION__;
					
					// ambil data
					$data['petugas'] = $this->model('Data_model')->petugas()[0];
					$data['pengguna'] = $this->model('PenggunaProccess_model')->search();
					
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
	
	public function pengaturan(){
		if (isset($_SESSION['petugasID'])) {
			$data['webtitle'] = 'Dashboard - Pengaturan';
			$data['css'] = ['dashboard_header.css', 'pengaturan_dashboard.css', 'base.css'];
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas()[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
						
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/pengaturan', $data);
			$this->view('template/footer', $data);
		}else {
			$this->kunci();
		}
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
	
	public function hapus($id = NULL){
		if (isset($_SESSION['petugasID'])) {
			if ($id != NULL) {
				$this->model('Delete_model')->user($id);
				header('location: ' . BASEURL . '/dashboard/pengguna');
			}else {
				$this->index();
			}
		}else {
			$this->kunci();
		}
	}
}