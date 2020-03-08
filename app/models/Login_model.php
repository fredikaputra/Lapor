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
					echo "tidak";
				}
			}else {
				echo 'tida';
				var_dump($this->db->affectedRows());
			}
		}
	}
	
	public function verifyPass($pass1, $pass2){
		if (password_verify($pass1, $pass2)) {
			return true;
		}
	}
}