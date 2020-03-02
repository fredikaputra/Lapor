<?php

class Login_model{
	private $db, $query;
	private $sanitized;
	
	// call database
	public function __construct(){
		$this->db = new Database;
	}
	
	// login proccess
	public function login($data){
		$this->db->dbh->real_escape_string(extract($data));
		$this->sanitized = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$this->query = "SELECT * FROM masyarakat WHERE username = ?";
		$this->db->preparedStatement($this->query);
		$this->db->sth->bind_param('s', $this->sanitized);
		$this->db->executeQuery();
		// check if data is exists
		if ($this->db->getResult() > 0) {
			//check if password is correct
			if ($this->checkPass($password, $this->db->row['password']) === TRUE) {
				$_SESSION['masyarakatNIK'] = $this->db->row['nik'];
			}else { // password isn't correct
				Flasher::setFlash('Username atau password salah!', 'warning');
			}
		}else { // username not from masyarakat
			$this->query = "SELECT * FROM petugas WHERE username = ?";
			$this->db->preparedStatement($this->query);
			$this->db->sth->bind_param('s', $this->sanitized);
			$this->db->executeQuery();
			// check if data is exists
			if ($this->db->getResult() > 0) {
				//check if password is correct
				if ($this->checkPass($password, $this->db->row['password']) === TRUE) {
					$_SESSION['petugasID'] = $this->db->row['id_petugas'];
					$_SESSION['gotodashboard'] = 'class="show"';
				}else { // password isn't correct
					Flasher::setFlash('Username atau password salah!', 'warning');
				}
			}else { // username not found
				Flasher::setFlash('Username atau password salah!', 'warning');
			}
		}
	}
	
	// check password process
	public function checkPass($userdbpass, $userformpass){
		if (password_verify($userdbpass, $userformpass)) {
			return true;
		}else {
			return false;
		}
	}
}