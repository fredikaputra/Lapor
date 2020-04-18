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
		
		// tampilkan halaman sungting
		// ketika pengguna sudah login
		// dan berstatus masyarakat
		if (isset($_SESSION['masyarakatNIK'])) {
			
			// jalankan proses ketika parameter bernilai 'proses'
			if ($option != NULL && $action == 'proses') {
				$_SESSION['loadingscreen'] = 1;
				
				// jalankan proses sunting nama
				// jika parameter option bernilai 'nama'
				if ($option == 'nama') {
					$this->model('Update_model')->masyarakat($option);
					header('location: ' . BASEURL . '/profil/sunting/nama');
				}
				
				// jalankan proses sunting username
				// jika parameter option bernilai 'username'
				else if ($option == 'username') {
					$this->model('Update_model')->masyarakat($option);
					header('location: ' . BASEURL . '/profil/sunting/username');
				}
				
				// jalankan proses sunting telepon
				// jika parameter option bernilai 'telepon'
				else if ($option == 'telepon') {
					$this->model('Update_model')->masyarakat($option);
					header('location: ' . BASEURL . '/profil/sunting/telepon');
				}
				
				// jalankan proses sunting foto-profil
				// jika parameter option bernilai 'foto-profil'
				else if ($option == 'foto-profil') {
					$this->model('Update_model')->masyarakat($option);
					header('location: ' . BASEURL . '/profil/sunting/foto-profil');
				}
				
				// jalankan proses sunting foto-profil
				// jika parameter option bernilai 'foto-profil'
				else if ($option == 'password') {
					$this->model('Update_model')->masyarakat($option);
					header('location: ' . BASEURL . '/profil/sunting/password');
				}
				
				// cek parameter
				// tampilkan halaman profil
				// parameter diluar konteks
				else {
					$this->index();
				}
			}
			
			// tampilkan halaman edit
			else if ($option != NULL && $action == NULL) {
				
				// deklarasikan variable
				// untuk dikirimkan ke halaman website
				$data['webtitle'] = 'Laporan! - Pengaturan';
				$data['css'] = ['detail_pengaturan.css', 'nav.css', 'base.css'];
				$data['js'] = ['settingDetectInputChange.js'];
				$data['controller'] = __CLASS__;
				
				// ambil data masyarakat
				$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
				$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
				$data['phone'] = $this->model('Data_model')->masyarakat()[0]['telp'];
				$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
				
				// tampilkan website
				// kirim semua data ($data) ke dalam website
				$this->view('template/header', $data);
				$this->view('template/nav', $data);
				
				// tampilkan halaman sunting nama
				if ($option == 'nama') {
					$this->view('profil/nama', $data);				
				}
				
				// tampilkan halaman sunting username
				else if ($option == 'username') {
					$this->view('profil/username', $data);
				}
				
				// tampilkan halaman sunting telepon
				else if ($option == 'telepon') {
					$this->view('profil/phone', $data);
				}
				
				// tampilkan halaman sunting foto profil
				else if ($option == 'foto-profil') {
					$this->view('profil/foto_profil', $data);
				}
				
				// tampilkan halaman sunting foto profil
				else if ($option == 'password') {
					$this->view('profil/password', $data);
				}
				
				// cek parameter
				// tampilkan halaman profil
				// parameter diluar konteks
				else {
					$this->index();
				}
				
				$this->view('template/footer', $data);
			}
			
			// cek parameter
			// tampilkan halaman profil
			// parameter diluar konteks
			else {
				$this->index();
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