<?php

class Dashboard extends Controller{
	public function index(){
		
		// tampilkan halaman ketika
		// petugas sudah login
		if (isset($_SESSION['petugasID'])) {
			
			// deklarasikan variable
			// untuk dikirimkan ke halaman website
			$data['webtitle'] = 'Dashboard';
			$data['css'] = ['side_dashboard.css', 'dashboard.css', 'base.css'];
			$data['method'] = __FUNCTION__;
			
			// ambil data pengguna
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
			
			// tampilkan website
			// kirim semua data ($data) ke dalam website
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/index', $data);
			$this->view('template/footer');
		}
		
		// kalau belum login
		// jangan tampilkan halaman ini
		else {
			
			// kalau petugas dalam
			// keadaan terkunci
			// pindah ke halaman lock screen
			if (isset($_SESSION['onLock'])) {
				$this->kunci();
			}
			
			// kalau tidak
			// pindah ke halaman login
			else {
				header('location: ' . BASEURL . '/login');
			}
		}
	}
	
	public function data_aduan($p1 = NULL, $p2 = NULL){
		
		// tampilkan halaman ketika
		// petugas sudah login
		if (isset($_SESSION['petugasID'])) {
			
			// ambil data pengguna
			$data['petugas'] = $this->model('Data_model')->petugas()[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';
			
			// cek parameter
			// tampilkan 1 data laporan (jika ada)
			// ketika parameter tidak kosong
			if ($p1 != NULL && $p2 == NULL) {
				
				// ambil data laporan
				$data['idpengaduan'] = $p1;
				$data['laporan'] = $this->model('Data_model')->laporan($data['idpengaduan'], '', '')[0];
				
				// cek id laporan
				// tampilkan data laporan
				// ketika id data laporan benar
				if ($data['laporan'] != NULL) {
					
					// deklarasikan variable
					// untuk dikirimkan ke halaman website
					$data['webtitle'] = 'Data Aduan #' . $data['idpengaduan'];
					$data['css'] = ['side_dashboard.css', 'detail_aduan.css', 'popup.css', 'base.css'];
					$data['method'] = __FUNCTION__;
					
					// cek query pada url (setelah tanda ?)
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
					
					// cetak laporan ketika halaman sedang memuat
					// jika query cetak terdapat pada url dan bernilai 1
					if (isset($get['cetak']) && $get['cetak'] == 1) {
						$data['js'] = ['print.js', 'directprint.js'];
					}
					
					// ambil fungsi cetak saja
					else {
						$data['js'] = ['print.js'];
					}
					
					// ambil data tanggapan
					$data['tanggapan'] = $this->model('Data_model')->tanggapan($data['idpengaduan']);
					
					// tampilkan website
					// kirim semua data ($data) ke dalam website
					$this->view('template/header', $data);
					$this->view('dashboard/header', $data);
					$this->view('dashboard/detail_aduan', $data);
					$this->view('template/popup');
					$this->view('template/footer', $data);
				}
				
				// tampilkan halaman data aduan
				// ketika parameter diluar konteks
				else {
					$this->data_aduan();
				}
			}
			
			// cek parameter
			// jalankan proses hapus
			// ketika parameter bernilai 'hapus'
			else if ($p1 == 'hapus' && $p2 != NULL) {
				$this->model('Delete_model')->laporan($p2);
				header('location: ' . BASEURL . '/dashboard/data_aduan');
			}
			
			// cek parameter
			// tampilkan semua data aduan
			// ketika parameter kosong
			else {
				
				// deklarasikan variable
				// untuk dikirimkan ke halaman website
				$data['webtitle'] = 'Dashboard - Data Aduan';
				$data['css'] = ['side_dashboard.css', 'data_aduan.css', 'popup.css', 'base.css'];
				$data['method'] = __FUNCTION__;
				
				// ambil data laporan
				$data['laporan'] = $this->model('Data_model')->laporan();
				
				// tampilkan website
				// kirim semua data ($data) ke dalam website
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/data_aduan', $data);
				$this->view('template/popup');
				$this->view('template/footer');
			}
		}
		
		// kalau belum login
		// jangan tampilkan halaman ini
		else {
			
			// kalau petugas dalam
			// keadaan terkunci
			// pindah ke halaman lock screen
			if (isset($_SESSION['onLock'])) {
				$this->kunci();
			}
			
			// kalau tidak
			// pindah ke halaman login
			else {
				header('location: ' . BASEURL . '/login');
			}
		}
	}
	
	public function pengguna($act = NULL, $id = NULL){
		
		// tampilkan halaman ketika
		// petugas sudah login
		if (isset($_SESSION['petugasID'])) {
			
			// cek parameter
			// jalankan proses hapus
			// ketika parameter bernilai 'hapus'
			if ($act == 'hapus' && $id != NULL) {
				$this->model('Delete_model')->pengguna($id);
				header('location: ' . BASEURL . '/dashboard/pengguna');
			}
			
			// cek parameter
			// tampilkan halaman pengguna
			// jika parameter diluar konteks
			else {
				
				// deklarasikan variable
				// untuk dikirimkan ke halaman website
				$data['webtitle'] = 'Dashboard - Pengguna';
				$data['css'] = ['side_dashboard.css', 'pengguna.css', 'popup.css', 'base.css'];
				$data['method'] = __FUNCTION__;
				
				// ambil data
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['users'] = $this->model('Data_model')->tableRow('masyarakat', 'petugas', NULL);
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';
				$data['pengguna'] = $this->model('Data_model')->pengguna();
				
				// tampilkan website
				// kirim semua data ($data) ke dalam website
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/pengguna', $data);
				$this->view('template/popup');
				$this->view('template/footer');
			}
		}
		
		// kalau belum login
		// jangan tampilkan halaman ini
		else {
			
			// kalau petugas dalam
			// keadaan terkunci
			// pindah ke halaman lock screen
			if (isset($_SESSION['onLock'])) {
				$this->kunci();
			}
			
			// kalau tidak
			// pindah ke halaman login
			else {
				header('location: ' . BASEURL . '/login');
			}
		}
	}
	
	public function tambah_pengguna($user = NULL, $act = NULL){
		
		// tampilkan halaman ketika
		// petugas sudah login
		if (isset($_SESSION['petugasID'])) {
			
			// cek parameter
			// tampilkan form tambah petugas
			if ($user == 'petugas' && $act == NULL) {
				
				// deklarasikan variable
				// untuk dikirimkan ke halaman website
				$data['webtitle'] = 'Dashboard - Tambah Pengguna Sebagai Petugas';
				$data['css'] = ['side_dashboard.css', 'form_tambah_petugas.css', 'base.css'];
				$data['js'] = ['unsetload.js'];
				$data['method'] = __FUNCTION__;
				
				// ambil data pengguna
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';
				
				// tampilkan website
				// kirim semua data ($data) ke dalam website
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/form_tambah_petugas', $data);
				$this->view('template/footer', $data);
			}
			
			// cek parameter
			// jalankan proses tambah petugas
			else if ($user == 'petugas' && $act == 'proses') {
				
				// pindah ke halaman pengguna
				// ketika proses tambah pengguna berhasil
				if ($this->model('Register_model')->petugas() == TRUE) {
					header('location: ' . BASEURL . '/dashboard/pengguna');
				}
				
				// kembali ke form
				// ketika proses tambah pengguna gagal
				else {
					header('location: ' . BASEURL . '/dashboard/tambah-pengguna/petugas');
				}
			}
			
			// cek parameter
			// tampilkan form tambah masyarakat
			else if($user == 'masyarakat' && $act == NULL){
				
				// deklarasikan variable
				// untuk dikirimkan ke halaman website
				$data['webtitle'] = 'Dashboard - Tambah Pengguna Sebagai Masyarakat';
				$data['css'] = ['side_dashboard.css', 'form_tambah_masyarakat.css', 'base.css'];
				$data['js'] = ['unsetload.js'];
				$data['method'] = __FUNCTION__;
				
				// ambil data pengguna
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';
				
				// tampilkan website
				// kirim semua data ($data) ke dalam website
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/form_tambah_masyarakat', $data);
				$this->view('template/footer', $data);
			}
			
			// cek parameter
			// jalankan proses tambah masyarakat
			else if ($user == 'masyarakat' && $act == 'proses') {
				
				// pindah ke halaman pengguna
				// ketika proses tambah pengguna berhasil
				if ($this->model('Register_model')->masyarakat() == TRUE) {
					header('location: ' . BASEURL . '/dashboard/pengguna');
				}
				
				// kembali ke form
				// ketika proses tambah pengguna gagal
				else {
					header('location: ' . BASEURL . '/dashboard/tambah-pengguna/masyarakat');
				}
			}
			
			// cek parameter
			// tampilkan pilihan tambah pengguna
			// jika parameter diluar konteks
			else{
				
				// deklarasikan variable
				// untuk dikirimkan ke halaman website
				$data['webtitle'] = 'Dashboard - Tambah Pengguna';
				$data['css'] = ['side_dashboard.css', 'tambah_pengguna.css', 'base.css'];
				$data['method'] = __FUNCTION__;
				
				// ambil data pengguna
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';
				
				// tampilkan website
				// kirim semua data ($data) ke dalam website
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/tambah_pengguna', $data);
				$this->view('template/footer');
			}
		}
		
		// kalau belum login
		// jangan tampilkan halaman ini
		else {
			
			// kalau petugas dalam
			// keadaan terkunci
			// pindah ke halaman lock screen
			if (isset($_SESSION['onLock'])) {
				$this->kunci();
			}
			
			// kalau tidak
			// pindah ke halaman login
			else {
				header('location: ' . BASEURL . '/login');
			}
		}
	}
	
	public function kunci(){
		
		// tampilkan halaman ketika
		// petugas sudah login atau dalam kondisi terkunci
		if (isset($_SESSION['petugasID']) || isset($_SESSION['onLock'])) {
			
			// deklarasikan variable
			// untuk dikirimkan ke halaman website
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
			
			// unset id petugas
			// untuk menghilangkan hak akses
			// masuk dashboard
			if (isset($_SESSION['petugasID'])) {
				unset($_SESSION['petugasID']);
			}
			
			// tampilkan website
			// kirim semua data ($data) ke dalam website
			$this->view('template/header', $data);
			$this->view('dashboard/lockscreen', $data);
			$this->view('template/footer');
		}
		
		// kalau belum login
		// jangan tampilkan halaman ini
		else {
			header('location: ' . BASEURL . '/login');
		}
	}
	
	public function pengaturan($option = NULL){
		
		// tampilkan halaman ketika
		// petugas sudah login
		if (isset($_SESSION['petugasID'])) {
			
			// cek parameter
			// proses halaman
			if ($option == 'proses') {
				$this->model('Update_model')->petugas();
				header('location: ' . BASEURL . '/dashboard/pengaturan');
			}
			
			// cek parameter
			// tampilkan halaman pengaturan profil
			else {
				
				// deklarasikan variable
				// untuk dikirimkan ke halaman website
				$data['webtitle'] = 'Dashboard - Pengaturan';
				$data['css'] = ['side_dashboard.css', 'pengaturan_dashboard.css', 'base.css'];
				$data['method'] = __FUNCTION__;
				
				// ambil data pengguna
				$data['petugas'] = $this->model('Data_model')->petugas()[0];
				$data['photo'] = $_SESSION['petugasID'] . '.jpg';

				// tampilkan website
				// kirim semua data ($data) ke dalam website
				$this->view('template/header', $data);
				$this->view('dashboard/header', $data);
				$this->view('dashboard/pengaturan', $data);
				$this->view('template/footer');
			}
		}
		
		// kalau belum login
		// jangan tampilkan halaman ini
		else {
			
			// kalau petugas dalam
			// keadaan terkunci
			// pindah ke halaman lock screen
			if (isset($_SESSION['onLock'])) {
				$this->kunci();
			}
			
			// kalau tidak
			// pindah ke halaman login
			else {
				header('location: ' . BASEURL . '/login');
			}
		}
	}
	
	public function aktivitas_pengguna(){
		
		// tampilkan halaman ketika
		// petugas sudah login
		if (isset($_SESSION['petugasID'])) {
			
			// deklarasikan variable
			// untuk dikirimkan ke halaman website
			$data['webtitle'] = 'Dashboard - Aktifitas pengguna';
			$data['css'] = ['side_dashboard.css', 'aktivitas_pengguna.css', 'base.css'];
			$data['method'] = __FUNCTION__;
			
			// ambil data pengguna
			$data['pengguna'] = $this->model('Data_model')->pengguna();
			$data['petugas'] = $this->model('Data_model')->petugas()[0];
			$data['photo'] = $_SESSION['petugasID'] . '.jpg';

			// tampilkan website
			// kirim semua data ($data) ke dalam website
			$this->view('template/header', $data);
			$this->view('dashboard/header', $data);
			$this->view('dashboard/aktivitas_pengguna', $data);
			$this->view('template/footer');
		}
		
		// kalau belum login
		// jangan tampilkan halaman ini
		else {
			
			// kalau petugas dalam
			// keadaan terkunci
			// pindah ke halaman lock screen
			if (isset($_SESSION['onLock'])) {
				$this->kunci();
			}
			
			// kalau tidak
			// pindah ke halaman login
			else {
				header('location: ' . BASEURL . '/login');
			}
		}
	}
	
	public function tambah_tanggapan($idpengaduan = NULL){
		
		// jalankan proses ketika
		// petugas sudah login
		if (isset($_SESSION['petugasID'])) {
			
			// jalankan proses
			// ketika parameter tidak kosong
			if ($idpengaduan != NULL) {
				
				// lakukan proses
				// tambah tanggapan
				$this->model('Insert_model')->tanggapan($idpengaduan);
				
				// pindah ke halaman data aduan
				header('location: ' . BASEURL . '/dashboard/data-aduan/' . $idpengaduan);
			}
			
			// pindah ke halaman beranda dashboard
			// ketika parameter kosong
			else {
				$this->index();
			}
		}
		
		// kalau belum login
		// jangan tampilkan halaman ini
		else {
			
			// kalau petugas dalam
			// keadaan terkunci
			// pindah ke halaman lock screen
			if (isset($_SESSION['onLock'])) {
				$this->kunci();
			}
			
			// kalau tidak
			// pindah ke halaman login
			else {
				header('location: ' . BASEURL . '/login');
			}
		}
	}
}