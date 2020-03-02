<?php

class GetDBData_model{
	private $db, $query;
	
	// call database
	public function __construct(){
		$this->db = new Database;
	}
	
	// get masyarakat name process
	public function getMasyarakatData($nik){
		$this->query = "SELECT * FROM masyarakat WHERE nik = ?";
		$this->db->preparedStatement($this->query);
		$this->db->sth->bind_param('s', $nik);
		$this->db->executeQuery();
		// check if data exists
		if ($this->db->getResult() > 0) {
			return $this->db->row;
		}else { // data not found
			return '-';
		}
	}
	
	public function getPetugasData($petugasID){
		$this->query = "SELECT * FROM petugas JOIN level_petugas ON petugas.level = level_petugas.id WHERE id_petugas = ?";
		$this->db->preparedStatement($this->query);
		$this->db->sth->bind_param('s', $petugasID);
		$this->db->executeQuery();
		// check if data exists
		if ($this->db->getResult() > 0) {
			return $this->db->row;
		}else { // data not found
			return '-';
		}
	}
}