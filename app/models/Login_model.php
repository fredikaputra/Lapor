<?php

class Login_model{
	private $db;
	private $query;
	private $row;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function login($data){
		extract($data);
		$this->query = "SELECT * FROM masyarakat WHERE username = '$username'";
		$this->db->query($this->query);
		$this->db->execute();
		$this->row = $this->db->showResult();
		echo $this->row['username'];
	}
}