<?php

class Login_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function loginMasyarakat($data){
		if (extract($data)) {
			$query = "SELECT * FROM masyarakat WHERE username = '$username'";
			$this->db->query($query);
			$this->db->resultSet();
			if ($this->db->rowCount() > 0) {
				if ($this->checkPass($password, $this->db->row['password']) === TRUE) {
					$_SESSION['masyarakatNIK'] = $this->db->row['nik'];
				}else {
					Flasher::setFlash('Username atau password salah!', 'warning');
				}
			}else {
				Flasher::setFlash('Username atau password salah!', 'warning');
			}
		}else {
			Flasher::setFlash('Terjadi kesalahan saat memproses!', 'danger');
		}
	}
	
	public function checkPass($formpass, $dbpass){
		if (password_verify($formpass, $dbpass)) {
			return true;
		}else {
			return false;
		}
	}
}