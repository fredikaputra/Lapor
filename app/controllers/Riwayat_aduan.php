<?php

class Riwayat_aduan extends Controller{
	public function index(){
		
		// tampilkan halaman riwayat aduan
		// jika pengguna sudah login
		// dan berstatus masyarakat
		if (isset($_SESSION['masyarakatNIK'])) {
			
			// deklarasikan variable
			// untuk dikirimkan ke halaman website
			$data['webtitle'] = 'Dashboard - Riwayat Aduan';
			$data['css'] = ['riwayat_aduan.css', 'nav.css', 'base.css'];
			$data['controller'] = __CLASS__;
			
			// ambil data pengguna
			$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
			$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
			$data['laporan'] = $this->model('Data_model')->laporan(NULL, $_SESSION['masyarakatNIK'], NULL);
			$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
			
			// tampilkan website
			// kirim semua data ($data) ke dalam website
			$this->view('template/header', $data);
			$this->view('template/nav', $data);
			$this->view('riwayat_aduan/index', $data);
			$this->view('template/footer');
		}
		
		// pindah ke halaman dashboard / data aduan
		// jika pengguna sudah login
		// dan berstatus petugas
		else if (isset($_SESSION['petugasID'])) {
			header('location: ' . BASEURL . '/dashboard/data-aduan');
		}
		
		// pindah ke halaman login
		// jika pengguna belum login
		else {
			header('location: ' . BASEURL . '/login');
		}
	}
	
	public function detail($idpengaduan = NULL){
		
		// cek parameter
		// tampilkan detail data aduan
		if ($idpengaduan != NULL) {
			
			// tampilkan halaman detail
			// jika pengguna sudah login
			// dan berstatus masyarakat
			if (isset($_SESSION['masyarakatNIK'])) {
				
				// ambil data aduan
				$data['laporan'] = $this->model('Data_model')->laporan($idpengaduan, NULL, NULL)[0];
				
				// tampilkan data aduan ketika id aduan benar
				if ($data['laporan'] != NULL) {
					
					// deklarasikan variable
					// untuk dikirimkan ke halaman website
					$data['webtitle'] = 'Dashboard - Riwayat Aduan';
					$data['css'] = ['detail_riwayat_aduan.css', 'nav.css', 'base.css'];
					$data['controller'] = __CLASS__;
					$data['photo'] = $_SESSION['masyarakatNIK'] . '.jpg';
					
					// ambil data
					$data['name'] = $this->model('Data_model')->masyarakat()[0]['nama'];
					$data['username'] = $this->model('Data_model')->masyarakat()[0]['username'];
					$data['tanggapan'] = $this->model('Data_model')->tanggapan($idpengaduan);
					
					// tampilkan website
					// kirim semua data ($data) ke dalam website
					$this->view('template/header', $data);
					$this->view('template/nav', $data);
					$this->view('riwayat_aduan/detail', $data);
					$this->view('template/footer');
				}
				
				// tampilkan halaman riwayat aduan
				// ketika data laporan yang diminta
				// tidak tersedia
				else {
					$this->index();
				}
			}
			
			// pindah ke halaman dashboard / data aduan
			// jika pengguna sudah login
			// dan berstatus petugas
			else if (isset($_SESSION['petugasID'])) {
				header('location: ' . BASEURL . '/dashboard/data-aduan');
			}
			
			// pindah ke halaman login
			// jika pengguna belum login
			else {
				header('location: ' . BASEURL . '/login');
			}
		}
		
		// tampilkan halaman riwayat aduan
		// ketika parameter diluar konteks
		else{
			$this->index();
		}
	}
}