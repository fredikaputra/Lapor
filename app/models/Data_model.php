<?php

class Data_model{
	private $db;
	private $table = 'pengaduan';
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function report($nik){
		$query = "SELECT * FROM $this->table WHERE nik = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $nik);
		$this->db->execute();
		if ($this->db->getAllResult() > 0) {
			return $this->db->row;
		}
	}
}