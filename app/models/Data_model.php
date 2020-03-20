<?php

class Data_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function masHistReport($nik){
		$query = "SELECT * FROM pengaduan WHERE nik = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $nik);
		$this->db->execute();
		if ($this->db->getAllResult() > 0) {
			return $this->db->row;
		}
	}
	
	public function masyarakat($nik){
		$query = "SELECT * FROM masyarakat WHERE nik = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $nik);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			return $this->db->row;
		}
	}
}