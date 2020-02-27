<?php

class Daftar_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function addMasyarakat($data){
		extract($data);
		$password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
		
		$query = mysqli_query($this->db->connect(), "INSERT INTO masyarakat VALUES ('$nik', '$name', '$username', '$password', '$phone')");
		if ($query) {
			echo 'mantpa';
			header('location: ' . BASEURL . '/lapor');
		}else {
			echo("Error description: " . $this->db->dbh->error);
			// header('location: ' . BASEURL . '/lapor');
		}
	}
}