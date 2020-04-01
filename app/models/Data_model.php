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
	
	public function laporan($nik = '', $limit = ''){
		if ($nik != '') {
			$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE id_pengaduan = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $nik);
			$this->db->execute();
			if ($this->db->getResult() == !NULL) {
				return $this->db->row;
			}
		}else if($limit != '') {
			$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) ORDER BY tgl_pengaduan DESC LIMIT $limit";
			$this->db->prepare($query);
			$this->db->execute();
			if ($this->db->getResult() == !NULL) {
				return $this->db->row;
			}
		}
	}
	
	public function tanggapan($id){
		$query = "SELECT tanggapan.*, nama_petugas, level FROM tanggapan JOIN petugas USING(id_petugas) WHERE id_pengaduan = ? ORDER BY tgl_tanggapan DESC";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->getResult() == !NULL) {
			return $this->db->row;
		}
	}
}