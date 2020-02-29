<?php

class Register_model extends Controller{
	private $db, $query;
	private $password;
	
	// call database
	public function __construct(){
		$this->db = new Database;
	}
	
	// register proccess
	public function register($data){
		// filter string to prevent from sql injection
		$this->db->dbh->real_escape_string(extract($data));
		if ($this->checkAvailableUsername($username) === TRUE) {
			if ($this->checkPass($password) === TRUE) {
				$this->password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
				$this->query = "INSERT INTO masyarakat VALUES(?, ?, ?, ?, ?)";
				$this->db->preparedStatement($this->query);
				$this->db->sth->bind_param('sssss', $nik,
													$name,
													$username,
													$this->password,
													$phone);
				$this->db->executeQuery();
				// check if query is success
				if ($this->db->affectedRows() > 0) {
					Flasher::setFlash('Anda berhasil terdaftar!', 'success');
				}else { // something went wrong
					Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'danger');
				}
			}else { // password min 8 char
				Flasher::setFlash('Password minimal 8 karakter!', 'warning');
				return 'BACKTOSIGNUP';
			}
		}else { // username unavailable
			Flasher::setFlash('Username sudah digunakan!', 'warning');
			return 'BACKTOSIGNUP';
		}
	}
	
	// validate password
	public function checkPass($password){
		if (strlen($password) >= 8) {
			return true;
		}
	}
	
	public function checkAvailableUsername($username){
		$this->query = "SELECT * FROM masyarakat WHERE username = ?";
		$this->db->preparedStatement($this->query);
		$this->db->sth->bind_param('s', $username);
		$this->db->executeQuery();
		if ($this->db->getResult() <= 0) {
			return true;
		}
	}
}