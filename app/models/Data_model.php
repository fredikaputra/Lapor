<?php

class Data_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function petugas(){ // ambil data petugas
		$query = "SELECT * FROM petugas WHERE id_petugas = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $_SESSION['petugasID']);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	public function masyarakat(){ // ambil data masyarakat
		$query = "SELECT * FROM masyarakat WHERE nik = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $_SESSION['masyarakatNIK']);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	public function laporan($id = NULL, $nik = NULL, $limit = NULL){ // ambil data pengaduan
		if ($id != NULL) {
			$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE id_pengaduan = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
		}else if ($nik != NULL) {
			$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE nik = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $nik);
		}else if ($limit != NULL) {
			$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) ORDER BY tgl_pengaduan DESC LIMIT ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $limit);
		}else {
			$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) ORDER BY tgl_pengaduan DESC LIMIT 10";
			$this->db->prepare($query);
		}
		
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	public function laporanFilter(){
		$urlData = parse_url($_SERVER['REQUEST_URI'])['query'];
		$urlData = explode('&', $urlData);
		foreach($urlData as $key => $value) {
			$data = explode('=', $value);
			$get[$data[0]] = $data[1];
		}
		
		if ($get['img'] == 'wImg') {
			$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE foto IS NOT NULL";
		}else if ($get['img'] == 'woImg') {
			$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE foto IS NULL";
		}else {
			$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik)";
		}
		
		if ($get['img'] == 'wImg' || $get['img'] == 'woImg') {
			if ($get['status'] == '0') {
				$query .= " AND status = '0'";
			}else if ($get['status'] == '1') {
				$query .= " AND status = '1'";
			}
		}else {
			if ($get['status'] == '0') {
				$query .= " WHERE status = '0'";
			}else if ($get['status'] == '1') {
				$query .= " WHERE status = '1'";
			}
		}
		
		if ($get['sort'] == 'dateDESC') {
			$query .= " ORDER BY tgl_pengaduan DESC";
		}else if ($get['sort'] == 'dateASC') {
			$query .= " ORDER BY tgl_pengaduan ASC";
		}else if ($get['sort'] == 'nameASC') {
			$query .= " ORDER BY nama ASC";
		}else if ($get['sort'] == 'nameDESC') {
			$query .= " ORDER BY nama DESC";
		}
		
		if ($get['show'] == '10') {
			$query .= " LIMIT 10";
		}else if ($get['show'] == '20') {
			$query .= " LIMIT 20";
		}else if ($get['show'] == '50') {
			$query .= " LIMIT 50";
		}else if ($get['show'] == '100') {
			$query .= " LIMIT 100";
		}
		
		$this->db->prepare($query);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	public function tanggapan($id){ // ambil data tanggapan
		$query = "SELECT tanggapan.*, nama_petugas, level FROM tanggapan JOIN petugas USING(id_petugas) WHERE id_pengaduan = ? ORDER BY tgl_tanggapan DESC";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	public function pengguna(){ // ambil data pengguna
		$query = "SELECT id_petugas AS id, nama_petugas AS nama, username, telp, level FROM petugas
					UNION
					SELECT nik AS id, nama, username, telp, telp AS level FROM masyarakat ORDER BY nama LIMIT 10";
		$this->db->prepare($query);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	public function tableRow($tb1, $tb2 = NULL, $cond = NULL){
		$query = "SELECT COUNT(*) AS totalRows FROM $tb1";
		
		if ($tb2 != NULL) {
			$query = "SELECT (SELECT COUNT(*) FROM $tb1 ) + (SELECT COUNT(*) FROM $tb2 ) AS totalRows";
		}
		
		if ($cond != NULL) {
			$query .= " WHERE $cond";
		}
		
		$this->db->prepare($query);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row[0]['totalRows'];
	}
	
	public static function timeCounter($time){
		$diff = date_diff(date_create(date('Y-m-d H:i:s', $time)), date_create(date('Y-m-d H:i:s')));
		if ($diff->y) {
			return date('d/m/Y', $time);
		}else if ($diff->m) {
			return strftime("%d %B", $time);
		}else if ($diff->d) {
			return $diff->d . ' hari yang lalu';
		}else if ($diff->h) {
			return $diff->h . ' jam yang lalu';
		}else if ($diff->i) {
			return $diff->i . ' menit yang lalu';
		}else if ($diff->s) {
			return $diff->s . ' detik yang lalu';
		}else {
			return 'Baru saja';
		}
	}
}