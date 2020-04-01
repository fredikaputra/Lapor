<?php

class Data_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function petugas($id){
		$query = "SELECT * FROM petugas WHERE id_petugas = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->getResult() == !NULL) {
			return $this->db->row;
		}
	}
	
	public function masyarakat($nik){
		$query = "SELECT * FROM masyarakat WHERE nik = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $nik);
		$this->db->execute();
		if ($this->db->getResult() == !NULL) {
			return $this->db->row;
		}
	}
	
	public function laporan($nik = ''){
		if ($nik != '') {
			$query = "SELECT * FROM pengaduan WHERE nik = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $nik);
			$this->db->execute();
			if ($this->db->getResult() == !NULL) {
				return $this->db->row;
			}
		}else {
			$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) ORDER BY tgl_pengaduan DESC LIMIT 4";
			$this->db->prepare($query);
			$this->db->execute();
			if ($this->db->getResult() == !NULL) {
				return $this->db->row;
			}
		}
	}
}