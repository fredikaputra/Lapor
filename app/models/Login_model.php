<?php

class Login_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
		
		$this->db->dbh->real_escape_string(extract($_POST));
		
		// jalankan fungsi ketika pengguna
		// menekan tombol submit pada form
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
			
			$query = "SELECT * FROM masyarakat WHERE username = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			if ($this->db->getResult() > 0) {
				
				// lakukan verifikasi password
				// yang telah di enkripsi
				$password_db = $this->db->row[0]['password'];
				if (password_verify($password, $password_db)) {
					$_SESSION['masyarakatNIK'] = $this->db->row[0]['nik'];
					return true;
				}else {
					Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
				}
			}
			
			// cek table petugas
			// jika username tidak ditemukan
			// pada table masyarakat
			else {
				$query = "SELECT * FROM petugas WHERE username = ?";
				$this->db->prepare($query);
				$this->db->sth->bind_param('s', $username);
				$this->db->execute();
				if ($this->db->getResult() > 0) {
					
					// lakukan verifikasi password
					// yang telah di enkripsi
					$password_db = $this->db->row[0]['password'];
					if (password_verify($password, $password_db)) {
						$_SESSION['petugasID'] = $this->db->row[0]['id_petugas'];
						return true;
					}else {
						Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
					}
				}else {
					Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
				}
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
}