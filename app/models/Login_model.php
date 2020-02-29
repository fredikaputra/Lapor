<?php

class Login_model{
	private $db;
	private $query;
	
	// call database
	public function __construct(){
		$this->db = new Database;
	}
	
	// login proccess
	public function login($data){
		extract($data);
		$this->query = "SELECT * FROM masyarakat WHERE username = ?";
		$this->db->preparedStatement($this->query);
		$this->db->sth->bind_param('s', $username);
		$this->db->executeQuery();
		// check if data is exists
		if ($this->db->getResult() > 0) {
			//check if password is correct
			if ($this->checkPass($password, $this->db->row['password']) === TRUE) {
				// set masyarakat session id
				$_SESSION['masyarakatNIK'] = $this->db->row['nik'];
			}else { // password isn't correct
				echo 'tidak mantap';
			}
		}else { // username not found
			echo 'tidak mantap';
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