<?php

class GetData_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function autoMasyarakat(){
		$query = 'SELECT * FROM masyarakat WHERE nik = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $_SESSION['masyarakatNIK']);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			return $this->db->row;
		}else {
			Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'attention');
		}
	}
	
	public function petugas($data){
		$query = 'SELECT * FROM petugas WHERE id_petugas = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $data);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			return $this->db->row;
		}else {
			Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'attention');
		}
	}
}