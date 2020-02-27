<?php

class Login_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function loginMasyarakat($data){
		extract($data);
		
		$query = mysqli_query($this->db->connect(), "SELECT * FROM masyarakat WHERE username = '$username'");
		$row = mysqli_fetch_assoc($query);
		
		if (mysqli_num_rows($query) > 0) {
			if (password_verify($password, $row['password'])) {
				$_SESSION['masyarakatNIK'] = $row['nik'];
				header('location: ' . BASEURL . '/lapor');
			}else {
				echo "tidak";
			}
		}
	}
}