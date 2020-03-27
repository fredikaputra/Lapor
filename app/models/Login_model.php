<?php

class Login_model{
	private $db;
	private $table = 'masyarakat';
	private $pass;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function main($data){
		$this->db->dbh->real_escape_string(extract($data));
		if (isset($login)) {
			$query = "SELECT * FROM $this->table WHERE username = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			if ($this->db->getResult() > 0) {
				$this->pass = $this->db->row[0][3];
				if ($this->passCheck($password) === TRUE) {
					$_SESSION['masyarakatNIK'] = $this->db->row[0][0];
				}else {
					Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
					return false;
				}
			}else {
				Flasher::setFlash('Gagal! ', 'Username atau password anda salah.', 'warning', 'warning');
				return false;
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function passCheck($pass){
		return password_verify($pass, $this->pass);
	}
}