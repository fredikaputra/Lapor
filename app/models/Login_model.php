<?php

class Login_model{
	private $db;
	private $pass;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function proccess($data){
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($login)) { // cek ketika button submit di tekan pada form
			$query = "SELECT * FROM masyarakat WHERE username = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			if ($this->db->getResult() > 0) {
				$this->pass = $this->db->row[0]['password'];
				if (password_verify($pass, $this->pass) === TRUE) {
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
					$this->pass = $this->db->row[0]['password'];
					if (password_verify($pass, $this->pass) === TRUE) {
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