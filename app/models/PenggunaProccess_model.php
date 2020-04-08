<?php

class PenggunaProccess_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function filter($data){
		$this->db->dbh->real_escape_string(extract($data));
		
		if ($privilege == 'admin') {
			$query = "SELECT id_petugas as id, nama_petugas as nama, username, telp, level FROM petugas WHERE level = '1'";
		}else if ($privilege == 'petugas') {
			$query = "SELECT id_petugas as id, nama_petugas as nama, username, telp, level FROM petugas WHERE level = '2'";
		}else if ($privilege == 'masyarakat') {
			$query = "SELECT nik as id, nama, username, telp, telp as level FROM masyarakat";
		}else if ($privilege == 'all') {
			$query = "SELECT id_petugas AS id, nama_petugas AS nama, username, telp, level FROM petugas
						UNION
						SELECT nik AS id, nama, username, telp, telp AS level FROM masyarakat";
		}
		
		if ($sort == 'nameASC') {
			$query .= " ORDER BY nama ASC";
		}else if ($sort == 'nameDESC') {
			$query .= " ORDER BY nama DESC";
		}
		
		if ($show == '10') {
			$query .= " LIMIT 10";
		}else if ($show == '20') {
			$query .= " LIMIT 20";
		}else if ($show == '50') {
			$query .= " LIMIT 50";
		}else if ($show == '100') {
			$query .= " LIMIT 100";
		}
		
		if (isset($_POST['querysearch'])) {
			unset($_POST['querysearch']);
		}
		
		$this->db->prepare($query);
		$this->db->execute();
		if ($this->db->getResult() != NULL) {
			return $this->db->row;
		}
	}
	
	public function search($data){
		$query = "SELECT id_petugas as id, nama_petugas as nama, username, telp, level FROM petugas WHERE nama_petugas LIKE '%" . $data['querysearch'] . "%' OR username LIKE '%" . $data['querysearch'] . "%'";
		$this->db->prepare($query);
		$this->db->execute();
		$this->db->getResult();
		
		$query = "SELECT nik as id, nama, username, telp, telp as level FROM masyarakat WHERE nama LIKE '%" . $data['querysearch'] . "%' OR username LIKE '%" . $data['querysearch'] . "%'";
		$this->db->prepare($query);
		$this->db->execute();
		$this->db->getResult();
		
		if (isset($_POST['privilege'])) {
			unset($_POST['privilege']);
		}
		if (isset($_POST['sort'])) {
			unset($_POST['sort']);
		}
		if (isset($_POST['show'])) {
			unset($_POST['show']);
		}
		
		return $this->db->row;
	}
}