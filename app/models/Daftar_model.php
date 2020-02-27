<?php

class Daftar_model{
	private $conn;
	
	public function __construct(){
		$this->conn = new Database;
	}
	
	public function addMasyarakat(){
		extract($_POST);
		
		$query = mysqli_query($this->conn->connect(), "INSERT INTO masyarakat VALUES ('$nik', '$name', '$username', '$password', '$phone')");
		if ($query) {
			echo 'mantpa';
			header('location: ' . BASEURL . '/lapor');
		}else {
			echo("Error description: " . $this->conn->dbh->error);
			// header('location: ' . BASEURL . '/lapor');
		}
	}
}