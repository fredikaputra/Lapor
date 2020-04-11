<?php

class Login_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
		
		$this->db->dbh->real_escape_string(extract($_POST));
		
		if (isset($login)) { // cek ketika button submit di tekan pada form
			if (isset($username)) {
				if (isset($_SESSION['onLock'])) {
					unset($_SESSION['onLock']);
				}
			}else if (isset($_SESSION['onLock'])) {
				$username = $_SESSION['onLock']['username'];
			}
			
			$query = "SELECT * FROM masyarakat WHERE username = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			if ($this->db->getResult() > 0) {
				$password_db = $this->db->row[0]['password'];
				if (password_verify($password, $password_db)) {
					$_SESSION['masyarakatNIK'] = $this->db->row[0]['nik'];
					return true;
				}else {
					Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
				}
			}else { // cek table petugas jika username tidak ditemukan pada table masyarakat
				$query = "SELECT * FROM petugas WHERE username = ?";
				$this->db->prepare($query);
				$this->db->sth->bind_param('s', $username);
				$this->db->execute();
				if ($this->db->getResult() > 0) {
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