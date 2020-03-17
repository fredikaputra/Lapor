<?php

class Login_model{
	private $db;
	private $table = 'masyarakat';
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function login($data){
		$this->db->dbh->real_escape_string(extract($data));
		if (isset($login)) {
			if ($this->masUserCheck($username) > 0) {
				if ($this->passVerify($username, $password) === TRUE) {
					$query = "SELECT * FROM $this->table WHERE username = ?";
					$this->db->prepare($query);
					$this->db->sth->bind_param('s', $username);
					$this->db->execute();
					if ($this->db->getResult() > 0) {
						$_SESSION['masyarakatNIK'] = $this->db->row['nik'];
						return true;
					}else {
						Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'warning.png');
					}
				}else {
					Flasher::setFlash('Username atau password anda salah!', 'bg-warning', 'warning.png');
				}
			}else {
				Flasher::setFlash('Username atau password anda salah!', 'bg-warning', 'warning.png');
			}
		}else {
			Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'warning.png');
		}
	}
	
	public function masUserCheck($username){
		$query = "SELECT username FROM $this->table WHERE username = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $username);
		$this->db->execute();
		return $this->db->getResult();
	}
	
	public function passVerify($username, $password){
		$query = "SELECT password FROM $this->table WHERE username = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $username);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			return password_verify($password, $this->db->row['password']);
		}
	}
}