<?php

class Login_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function proccess(){
		$this->db->dbh->real_escape_string(extract($_POST));
		
		// lanjutkan proses
		// ketika pengguna
		// telah menekan tombol submit
		if (isset($login)) {
			
			
			// ketika pengguna login
			// lewat halaman login
			// maka, hapus session onLock (kunci petugas)
			if (isset($username) && isset($_SESSION['onLock'])) {
				unset($_SESSION['onLock']);
			}
			
			// ketika pengguna login
			// lewat halaman unlock petugas
			// maka, gunakan username pada session onLock
			else if (isset($_SESSION['onLock'])) {
				$username = $_SESSION['onLock']['username'];
			}
			
			// ambil data masyarakat
			$query = "SELECT * FROM masyarakat WHERE username = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			
			// berhasil
			if ($this->db->getResult() > 0) {
				
				// lakukan verifikasi password
				// yang telah di enkripsi
				$password_db = $this->db->row[0]['password'];
				if (password_verify($password, $password_db)) {
					$_SESSION['masyarakatNIK'] = $this->db->row[0]['nik'];
					
					// buat log
					$log  = $_SESSION['masyarakatNIK'] . "|Telah login.|" . time() . PHP_EOL;
		
					// simpan log
					$createLog = file_put_contents(BASEURL . '/app/log/user_activity/log_' . date('d.m.Y') . '.log', $log, FILE_APPEND);
					
					return true;
				}
				
				// password salah
				else {
					Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
				}
			}
			
			// cek table petugas
			// jika username tidak ditemukan
			// pada table masyarakat
			else {
				
				// ambil data petugas
				$query = "SELECT * FROM petugas WHERE username = ?";
				$this->db->prepare($query);
				$this->db->sth->bind_param('s', $username);
				$this->db->execute();
				
				// berhasil
				if ($this->db->getResult() > 0) {
					
					// lakukan verifikasi password
					// yang telah di enkripsi
					$password_db = $this->db->row[0]['password'];
					if (password_verify($password, $password_db)) {
						$_SESSION['petugasID'] = $this->db->row[0]['id_petugas'];
						
						// buat log
						$log  = $_SESSION['petugasID'] . "|Telah login.|" . time() . PHP_EOL;
			
						// simpan
						$createLog = file_put_contents('app/log/log_' . date('d.m.Y') . '.log', $log, FILE_APPEND);
						
						return true;
					}
					
					// password salah
					else {
						Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
					}
				}
				
				// gagal
				else {
					Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
				}
			}
		}
		
		// terjadi kesalahan
		else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
}