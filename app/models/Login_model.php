<?php

class Login_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function login($data){
		$this->db->dbh->real_escape_string(extract($data));
		if (isset($login)) {
			$query = 'SELECT * FROM masyarakat WHERE username = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			if ($this->db->getResult() > 0) {
				if ($this->verifyPass($password, $this->db->row['password']) === TRUE) {
					$_SESSION['masyarakatNIK'] = $this->db->row['nik'];
				}else {
					Flasher::setFlash('Username atau password salah!', 'bg-warning', 'attention');
				}
			}else {
				$query = 'SELECT * FROM petugas WHERE username = ?';
				$this->db->prepare($query);
				$this->db->sth->bind_param('s', $username);
				$this->db->execute();
				if ($this->db->getResult() > 0) {
					if ($this->verifyPass($password, $this->db->row['password']) === TRUE) {
						$_SESSION['petugasID'] = $this->db->row['id_petugas'];
					}else {
						Flasher::setFlash('Username atau password salah!', 'bg-warning', 'attention');
					}
				}else {
					Flasher::setFlash('Username atau password salah!', 'bg-warning', 'attention');
				}
			}
		}
	}
	
	public function unlock($data){
		$this->db->dbh->real_escape_string(extract($data));
		if (isset($relogin)) {
			$query = 'SELECT * FROM petugas WHERE username = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $_SESSION['petugasUsername']);
			$this->db->execute();
			if ($this->db->getResult() > 0) {
				if ($this->verifyPass($password, $this->db->row['password']) === TRUE) {
					unset($_SESSION['petugasUsername']);
					unset($_SESSION['petugasName']);
					$_SESSION['petugasID'] = $this->db->row['id_petugas'];
					return true;
				}else {
					Flasher::setFlash('Password yang anda masukkan salah!', 'bg-warning', 'attention');
					return false;
				}
			}else {
				Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'attention');
				return false;
			}
		}
	}
	
	public function verifyPass($pass1, $pass2){
		if (password_verify($pass1, $pass2)) {
			return true;
		}
	}
}