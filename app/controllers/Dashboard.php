<?php

class Dashboard extends Controller{
	public function index(){
		if (isset($_SESSION['petugasID'])) { // hanya petugas yang boleh mengakses
			// deklarasikan data
			$data['webtitle'] = 'Dashboard';
			$data['css'] = ['dashboard_header.css', 'dashboard.css', 'base.css'];
			$data['method'] = __FUNCTION__;
			
			// ambil data petugas
			$data['petugas'] = $this->model('Data_model')->petugas()[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			
			// ambil data laporan
			$data['laporan'] = $this->model('Data_model')->laporan(NULL, NULL, '5');
			$data['tableRow'] = [
				'masyarakat' => $this->model('Data_model')->tableRow('masyarakat', NULL, NULL),
				'petugas' => $this->model('Data_model')->tableRow('petugas', NULL, NULL),
				'laporan' => $this->model('Data_model')->tableRow('pengaduan', NULL, NULL),
				'proses' => $this->model('Data_model')->tableRow('pengaduan', NULL, "status = '0'"),
				'selesai' => $this->model('Data_model')->tableRow('pengaduan', NULL, "status = '1'")
			];
			
			// tampilkan website serta kirim data nya ke view
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/index', $data);
			$this->view('template/footer');
		}else { // kunci petugas ketika session petugas id tidak terdeteksi
			$this->kunci();
		}
	}
	
	public function data_aduan($id = NULL){
		if (isset($_SESSION['petugasID'])) { // hanya petugas yang boleh mengakses
			// deklarasikan data
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas()[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			
			if ($id == NULL) { // tampilkan semua data aduan
				// deklarasikan data
				$data['webtitle'] = 'Dashboard - Data Aduan';
				$data['css'] = ['dashboard_header.css', 'data_aduan.css', 'base.css'];
				
				// ambil semua data laporan
				$data['laporan'] = $this->model('Data_model')->laporan();
				
				// tampilkan website serta kirim data nya ke view
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/data_aduan', $data);
				$this->view('template/footer');
			}else { // tampilkan 1 data aduan
				// ambil satu data laporan berdasarkan id laporan
				$data['idpengaduan'] = $id;
				$data['laporan'] = $this->model('Data_model')->laporan($data['idpengaduan'], '', '')[0];
				
				if ($data['laporan'] != NULL) { // tampilkan data laporan ketika data laporan ada
					// deklarasikan data
					$data['webtitle'] = 'Data Aduan ' . $data['idpengaduan'];
					$data['css'] = ['dashboard_header.css', 'detail_aduan.css', 'base.css'];
					
					if (isset($get['cetak']) && $get['cetak'] == 1) { // langsung cetak laporan
						$data['js'] = ['print.js', 'directprint.js'];
					}else {
						$data['js'] = ['print.js'];
					}
					
					// ambil data tanggapan
					$data['tanggapan'] = $this->model('Data_model')->tanggapan($data['idpengaduan']);
					
					// tampilkan website serta kirim data nya ke view
					$this->view('template/header', $data);
					$this->view('dashboard/header', $data);
					$this->view('dashboard/detail_aduan', $data);
					$this->view('template/footer', $data);
				}else { // ketika parameter diluar konteks, tampilkan halaman data aduan
					$this->data_aduan();
				}
			}
		}else { // kunci petugas ketika session petugas id tidak terdeteksi
			$this->kunci();
		}
	}
	
	public function pengguna(){
		if (isset($_SESSION['petugasID'])) { // hanya petugas yang boleh mengakses
			// deklarasikan data
			$data['webtitle'] = 'Dashboard - Pengguna';
			$data['css'] = ['dashboard_header.css', 'pengguna.css', 'base.css'];
			$data['method'] = __FUNCTION__;
			
			// ambil data
			$data['petugas'] = $this->model('Data_model')->petugas()[0];
			$data['users'] = $this->model('Data_model')->tableRow('masyarakat', 'petugas', NULL);
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			
			$url = parse_url($_SERVER['REQUEST_URI']);
			if (isset($url['query'])) {
				$url = parse_url($_SERVER['REQUEST_URI'])['query'];
				$url = explode('&', $url);
				foreach($url as $key => $value) {
					if (strpos($value, '=') != FALSE) {
						$query = explode('=', $value);
						$get[$query[0]] = $query[1];
					}
				}
			}
			
			if (isset($get['filter']) && $get['filter'] == 'on') {
				$data['pengguna'] = $this->model('PenggunaProccess_model')->filter($get);
			}else if (isset($get['search']) && $get['search'] == 'on') {
				$data['pengguna'] = $this->model('PenggunaProccess_model')->search($get);
			}else {
				$data['pengguna'] = $this->model('Data_model')->pengguna();
			}
			
			// tampilkan website serta kirim data nya ke view
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/pengguna', $data);
			$this->view('template/footer', $data);
		}else { // kunci petugas ketika session petugas id tidak terdeteksi
			$this->kunci();
		}
	}
	
	public function tambah_pengguna($user = NULL){
		if (isset($_SESSION['petugasID'])) { // hanya petugas yang boleh mengakses
			if ($user == 'petugas') { // tampilkan form tambah petugas
				// deklarasikan data
				$data['webtitle'] = 'Dashboard - Tambah Pengguna Sebagai Petugas';
				$data['css'] = ['dashboard_header.css', 'form_tambah_petugas.css', 'base.css'];
				$data['js'] = ['unsetload.js'];
				$data['method'] = __FUNCTION__;
				
				// ambil data petugas
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';
				
				// tampilkan website serta kirim data nya ke view
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/form_tambah_petugas', $data);
				$this->view('template/footer', $data);
			}else if($user == 'masyarakat'){ // tampilkan form tambah masyarakat
				// deklarasikan data
				$data['webtitle'] = 'Dashboard - Tambah Pengguna Sebagai Masyarakat';
				$data['css'] = ['dashboard_header.css', 'form_tambah_masyarakat.css', 'base.css'];
				$data['js'] = ['unsetload.js'];
				$data['method'] = __FUNCTION__;
				
				// ambil data petugas
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';
				
				// tampilkan website serta kirim data nya ke view
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/form_tambah_masyarakat', $data);
				$this->view('template/footer', $data);
			}else{
				// deklarasikan data
				$data['webtitle'] = 'Dashboard - Tambah Pengguna';
				$data['css'] = ['dashboard_header.css', 'tambah_pengguna.css', 'base.css'];
				$data['method'] = __FUNCTION__;
				
				// ambil data petugas
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';
				
				// tampilkan website serta kirim data nya ke view
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
		// deklarasikan data
		$data['webtitle'] = 'Dashboard - Terkunci';
		$data['css'] = ['lockscreen.css', 'base.css'];
		
		// convert data petugas dari POST menjadi SESSION
		if (!isset($_SESSION['onLock'])) {
			$_SESSION['onLock'] = [
				'username' => $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['username'],
				'name' => $this->model('Data_model')->petugas($_SESSION['petugasID'])[0]['nama_petugas'],
				'photo' => $_SESSION['petugasID'] . '.jpg'
			];
		}
		
		// unset id petugas untuk menghilangkan hak akses masuk dashboard
		if (isset($_SESSION['petugasID'])) {
			unset($_SESSION['petugasID']);
		}
		
		// tampilkan website serta kirim data nya ke view
		$this->view('template/header', $data);
		$this->view('dashboard/lockscreen', $data);
		$this->view('template/footer');
	}
	
	public function pengaturan($option = NULL){
		if (isset($_SESSION['petugasID'])) { // hanya petugas yang boleh mengakses
			if ($option == NULL) { // tampilkan halaman pengaturan
				$data['webtitle'] = 'Dashboard - Pengaturan';
				$data['css'] = ['dashboard_header.css', 'pengaturan_dashboard.css', 'base.css'];
				$data['method'] = __FUNCTION__;
				
				// ambil data
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';

				// tampilkan website serta kirim data nya ke view
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/pengaturan', $data);
				$this->view('template/footer', $data);
			}else if ($option == 'proccess') {
				$this->model('UpdatePreference_model')->petugas();
				header('location: ' . BASEURL . '/dashboard/pengaturan');
			}
		}else {
			$this->kunci();
		}
	}
	
	// bagian proses
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