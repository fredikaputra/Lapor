<?php

class Logout_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function logout(){
		session_destroy();
		header('location: ' . BASEURL);
	}
}