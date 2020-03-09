<?php

class Register_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function masyarakat($data){
		$this->db->dbh->real_escape_string(extract($data));
		if (isset($signup)) {
			if ($this->usernameCheck($username) !== TRUE) {
				if ($this->nikCheck($nik) !== TRUE) {
					$query = 'INSERT INTO masyarakat VALUES(?, ?, ?, ?, ?)';
					$this->db->prepare($query);
					$this->db->sth->bind_param('isssi', $nik, $name, $username, $password, $phone);
					$this->db->execute();
					if ($this->db->affectedRows() > 0) {
						Flasher::setFlash('Anda berhasil terdaftar!', 'bg-success', 'correct');
					}else {
						Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'attention');
					}
				}else {
					Flasher::setFlash('Nomor Induk Kependudukan (NIK) telah digunakan!', 'bg-warning', 'attention');
				}
			}else {
				Flasher::setFlash('Username telah digunakan!', 'bg-warning', 'attention');
			}
		}
	}
	
	public function nikCheck($nik){
		$query = 'SELECT * FROM masyarakat WHERE nik = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('i', $nik);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			return true;
		}
	}
	
	public function usernameCheck($username){
		$query = 'SELECT * FROM masyarakat WHERE username = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('i', $username);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			return true;
		}
	}
}