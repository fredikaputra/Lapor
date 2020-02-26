<?php

class Daftar_model extends Database{
	private $tbl = 'masyarakat';
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function addMasyarakat(){
		extract($_POST);		
		$query = "INSERT INTO masyarakat VALUES (:nik, :name, :username, :password, :phone)";
		
		$this->db->query($query);
		$this->db->bind('nik', $nik);
		$this->db->bind('name', $name);
		$this->db->bind('username', $username);
		$this->db->bind('password', $password);
		$this->db->bind('phone', $phone);
		
		$this->db->execute();
		
		return $this->db->rowCount();
	}
}