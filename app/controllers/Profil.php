<?php

class Profil extends Controller{
	public function index(){
		
		// tampilkan halaman profil
		// jika pengguna sudah login
		// dan berstatus masyarakat
		if (isset($_SESSION['masyarakatNIK'])) {
			
			// deklarasikan variable
			// untuk dikirimkan ke halaman website
			$data['webtitle'] = 'Laporan! - Pengaturan';
			$data['css'] = ['pengaturan.css', 'nav.css', 'base.css'];
			$data['controller'] = __CLASS__;
			
			// ambil data pengguna
			$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
			$data['nik'] = $this->model('Data_model')->masyarakat()[0]['nik'];
			$data['phone'] = $this->model('Data_model')->masyarakat()[0]['telp'];
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
			
			// tampilkan website
			// kirim semua data ($data) ke dalam website
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('profil/index', $data);
			$this->view('template/footer');
		}
		
		// pindah ke halaman dashboard
		// jika pengguna sudah login
		// dan berstatus petugas
		else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}
		
		// pindah ke halaman login
		// jika pengguna belum login
		else {
			header('location: ' . BASEURL . '/login');
		}
	}
	
	public function sunting($option = NULL, $action = NULL){
		if (isset($_SESSION['masyarakatNIK'])) {
			
			// tampilkan halaman sunting nama
			// jika parameter bernilai 'nama'
			if ($option == 'nama' && $action == NULL) {
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
			}
			
			// jalankan proses suntin nama
			// jika parameter 1 bernilai 'nama'
			// dan parameter 2 bernilai proses
			else if ($option == 'nama' && $action == 'proses') {
				$this->model('Update_model')->masyarakat('name');
				header('location: ' . BASEURL . '/profil/sunting/nama');
			}
			
			// tampilkan halaman sunting username
			// jika parameter bernilai 'username'
			else if ($option == 'username' && $action == NULL) {
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
			}
			
			// jalankan proses sunting username
			// jika parameter 1 bernilai 'username'
			// dan parameter 2 bernilai proses
			else if ($option == 'username' && $action == 'proses') {
				$this->model('Update_model')->masyarakat('username');
				header('location: ' . BASEURL . '/profil/sunting/username');
			}
			
			// tampilkan halaman sunting telepon
			// jika parameter bernilai 'telepon'
			else if ($option == 'telepon' && $action == NULL) {
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
			}
			
			// jalankan proses sunting telepon
			// jika parameter 1 bernilai 'telepon'
			// dan parameter 2 bernilai proses
			else if ($option == 'telepon' && $action == 'proses') {
				$this->model('Update_model')->masyarakat('telepon');
				header('location: ' . BASEURL . '/profil/sunting/telepon');
			}
			
			// tampilkan halaman sunting foto profil
			// jika parameter bernilai 'foto profil'
			else if ($option == 'foto-profil' && $action == NULL) {
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
			}
			
			// jalankan proses sunting foto-profil
			// jika parameter 1 bernilai 'foto-profil'
			// dan parameter 2 bernilai proses
			else if ($option == 'foto-profil' && $action == 'proses') {
				$this->model('Update_model')->masyarakat('foto-profil');
				header('location: ' . BASEURL . '/profil/sunting/foto-profil');
			}
		}
		
		// pindah ke halaman dashboard
		// jika pengguna sudah login
		// dan berstatus petugas
		else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard');
		}
		
		// pindah ke halaman login
		// jika pengguna belum login
		else {
			header('location: ' . BASEURL . '/login');
		}
	}
}