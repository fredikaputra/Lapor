<?php

class Login_model{
	private $db;
	private $table1 = 'masyarakat', $table2 = 'petugas';
	private $pass;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function proccess($data){
		$this->db->dbh->real_escape_string(extract($data));
		if (isset($login)) {
			$query = "SELECT * FROM $this->table1 WHERE username = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			if ($this->db->getResult() > 0) {
				$this->pass = $this->db->row[0]['password'];
				if ($this->passCheck($password) === TRUE) {
					$_SESSION['masyarakatNIK'] = $this->db->row[0]['nik'];
				}else {
					Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
					return false;
				}
			}else {
				$query = "SELECT * FROM $this->table2 WHERE username = ?";
				$this->db->prepare($query);
				$this->db->sth->bind_param('s', $username);
				$this->db->execute();
				if ($this->db->getResult() > 0) {
					$this->pass = $this->db->row[0]['password'];
					if ($this->passCheck($password) === TRUE) {
						$_SESSION['petugasID'] = $this->db->row[0]['id_petugas'];
					}else {
						Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
						return false;
					}
				}else {
					Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
					return false;
				}
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function passCheck($pass){
		return password_verify($pass, $this->pass);
	}
}