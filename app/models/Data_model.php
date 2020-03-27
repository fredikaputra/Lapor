<?php

class Data_model{
	private $db;
	private $table1 = 'petugas', $table2 = 'masyarakat', $table3 = 'pengaduan';
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function petugas($id){
		$query = "SELECT * FROM $this->table1 WHERE id_petugas = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->getResult() == !NULL) {
			return $this->db->row;
		}
	}
	
	public function masyarakat($nik){
		$query = "SELECT * FROM $this->table2 WHERE nik = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $nik);
		$this->db->execute();
		if ($this->db->getResult() == !NULL) {
			return $this->db->row;
		}
	}
	
	public function laporan(){
		$query = "SELECT * FROM $this->table3";
		$this->db->prepare($query);
		$this->db->execute();
		if ($this->db->getResult() == !NULL) {
			return $this->db->row;
		}
	}
}