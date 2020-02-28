<?php

class SelectDataFromDB_model{
	private $db;
	private $data;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function selectMasyarakatName($nik){
		$query = "SELECT * FROM masyarakat WHERE nik = '$nik'";
		$this->db->query($query);
		$this->db->resultSet();
		if ($this->db->rowCount() > 0) {
			return $this->db->row['nama'];
		}else {
			Flasher::setFlash('Terjadi kesalahan saat memproses!', 'danger');
		}
	}
}