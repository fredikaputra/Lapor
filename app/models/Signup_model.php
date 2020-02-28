<?php

class Signup_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function addMasyarakat($data){
		if (extract($data)) {
			if ($password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12])) {
				if ($query = "INSERT INTO masyarakat VALUES ('$nik', '$name', '$username', '$password', '$phone')") {
					$this->db->query($query);
					if ($this->db->rowCount() > 0) {
						Flasher::setFlash('Anda berhasil terdaftar!', 'success');
					}else {
						// echo("Error description: " . $this->db->dbh->error);
						Flasher::setFlash('Terjadi kesalahan saat memproses!', 'danger');
					}
				}
			}
		}
	}
}