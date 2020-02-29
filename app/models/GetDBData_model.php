<?php

class GetDBData_model{
	private $db, $query;
	
	// call database
	public function __construct(){
		$this->db = new Database;
	}
	
	// get masyarakat name process
	public function getMasyarakatName($nik){
		$this->query = "SELECT nama FROM masyarakat WHERE nik = ?";
		$this->db->preparedStatement($this->query);
		$this->db->sth->bind_param('s', $nik);
		$this->db->executeQuery();
		// check if data exists
		if ($this->db->getResult() > 0) {
			return $this->db->row['nama'];
		}else { // data not found
			return '-';
		}
	}
}