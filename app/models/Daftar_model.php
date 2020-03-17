<?php

class Daftar_model{
	private $db;
	private $table = 'masyarakat';
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function register($data){
		$this->db->dbh->real_escape_string(extract($data));
		if (isset($register)) {
			$_SESSION['register'] = [
				'nik' => $nik,
				'name' => $name,
				'username' => $username,
				'password' => $password,
				'phone' => $phone,
			];
			if ($this->nikCheck($nik) === TRUE) {
				if ($this->masUserCheck($username) === NULL) {
					if ($this->passCheck($password) === TRUE) {
						$password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
						$query = "INSERT INTO $this->table VALUES(?, ?, ?, ?, ?)";
						$this->db->prepare($query);
						$this->db->sth->bind_param('sssss', $nik, $name, $username, $password, $phone);
						$this->db->execute();
						if ($this->db->affectedRows() > 0) {
							Flasher::setFlash('Anda berhasil teregistrasi!', 'bg-success', 'correct.png');
							return true;
						}else {
							Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'warning.png');
						}
					}else {
						Flasher::setFlash('Password minimal 8 karakter!', 'bg-warning', 'warning.png');
					}
				}else {
					Flasher::setFlash('Username sudah digunakan!', 'bg-warning', 'warning.png');
				}
			}else {
				Flasher::setFlash('Nomor Induk Kependudukan sudah digunakan!', 'bg-warning', 'warning.png');
			}
		}else {
			Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'warning.png');
		}
	}
	
	public function nikCheck($nik){
		$query = "SELECT nik FROM $this->table WHERE nik = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('i', $nik);
		$this->db->execute();
		if ($this->db->getResult() === NULL) {
			return true;
		}
	}
	
	public function masUserCheck($username){
		$query = "SELECT username FROM $this->table WHERE username = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $username);
		$this->db->execute();
		return $this->db->getResult();
	}
	
	public function passCheck($password){
		if (strlen($password) >= 8) {
			return true;
		}
	}
}