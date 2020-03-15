<?php

class Check_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function login($data){
		$this->db->dbh->real_escape_string(extract($data));
		if (isset($login)) {
			echo 'mantap';
		}
	}
}