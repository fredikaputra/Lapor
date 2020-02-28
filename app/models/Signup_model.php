<?php

class Signup_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function addMasyarakat($data){
		if (extract($data)) {
			if ($password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12])) {
				$query = "INSERT INTO masyarakat VALUES ('$nik', '$name', '$username', '$password', '$phone')";
				$this->db->query($query);
				if (true) {
					Flasher::setFlash('Anda berhasil terdaftar!', 'success');
				}else {
					Flasher::setFlash('Terjadi kesalahan saat memproses! (Code: 3)', 'danger');
					var_dump($this->db->rowCount());
					die();
				}
			}else {
				Flasher::setFlash('Terjadi kesalahan saat memproses! (Code: 2)', 'danger');
			}
		}else {
			Flasher::setFlash('Terjadi kesalahan saat memproses! (Code: 1)', 'danger');
		}
	}
}

// $query = "SELECT * FROM masyarakat WHERE nik = '$nik' OR username = '$username'";
// $this->db->query($query);
// if ($this->db->rowCount() == 0) {
// 
// }else {
// 	Flasher::setFlash('Username sudah digunakan!', 'warning');
// }