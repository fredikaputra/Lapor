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
		$url = parse_url($_SERVER['REQUEST_URI']);
		if (isset($url['query'])) {
			$url = parse_url($_SERVER['REQUEST_URI'])['query'];
			$url = explode('&', $url);
			foreach($url as $key => $value) {
				if (strpos($value, '=') != FALSE) {
					$query = explode('=', $value);
					$get[$query[0]] = $query[1];
				}
			}
		}
		
		if (isset($get['filter']) && $get['filter'] == 'on') {
			if ($get['gambar'] == '2') {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE foto IS NOT NULL";
			}else if ($get['gambar'] == '1') {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE foto IS NULL";
			}else {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik)";
			}
			
			if ($get['gambar'] == '1' || $get['gambar'] == '2') {
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
			
			if ($get['urutan'] == '1') {
				$query .= " ORDER BY tgl_pengaduan DESC";
			}else if ($get['urutan'] == '2') {
				$query .= " ORDER BY tgl_pengaduan ASC";
			}else if ($get['urutan'] == '3') {
				$query .= " ORDER BY nama ASC";
			}else if ($get['urutan'] == '4') {
				$query .= " ORDER BY nama DESC";
			}
			
			if ($get['tampil'] == '10') {
				$query .= " LIMIT 10";
			}else if ($get['tampil'] == '20') {
				$query .= " LIMIT 20";
			}else if ($get['tampil'] == '50') {
				$query .= " LIMIT 50";
			}
			
			$this->db->prepare($query);
		}else {
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
			
		}
		
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
		if (isset($url['query'])) {
			$url = parse_url($_SERVER['REQUEST_URI'])['query'];
			$url = explode('&', $url);
			foreach($url as $key => $value) {
				if (strpos($value, '=') != FALSE) {
					$query = explode('=', $value);
					$get[$query[0]] = $query[1];
				}
			}
		}
		
		if (isset($get['filter']) && $get['filter'] == 'on') {
			if ($get['hak'] == '1') {
				$query = "SELECT id_petugas as id, nama_petugas as nama, username, telp, level FROM petugas WHERE level = '1'";
			}else if ($get['hak'] == '2') {
				$query = "SELECT id_petugas as id, nama_petugas as nama, username, telp, level FROM petugas WHERE level = '2'";
			}else if ($get['hak'] == '3') {
				$query = "SELECT nik as id, nama, username, telp, telp as level FROM masyarakat";
			}else {
				$query = "SELECT id_petugas AS id, nama_petugas AS nama, username, telp, level FROM petugas
							UNION
							SELECT nik AS id, nama, username, telp, telp AS level FROM masyarakat";
			}
			
			if ($get['urutan'] == '1') {
				$query .= " ORDER BY nama ASC";
			}else if ($get['urutan'] == '2') {
				$query .= " ORDER BY nama DESC";
			}
			
			if ($get['tampil'] == '10') {
				$query .= " LIMIT 10";
			}else if ($get['tampil'] == '20') {
				$query .= " LIMIT 20";
			}else if ($get['tampil'] == '50') {
				$query .= " LIMIT 50";
			}
		}else if (isset($get['querysearch']) && $get['search'] == 'on') {
			$query = "SELECT id_petugas as id, nama_petugas as nama, username, telp, level FROM petugas WHERE nama_petugas LIKE '%" . $get['querysearch'] . "%' OR username LIKE '%" . $get['querysearch'] . "%'";
			$this->db->prepare($query);
			$this->db->execute();
			$this->db->getResult();
			
			$query = "SELECT nik as id, nama, username, telp, telp as level FROM masyarakat WHERE nama LIKE '%" . $get['querysearch'] . "%' OR username LIKE '%" . $get['querysearch'] . "%'";
		}else {
			$query = "SELECT id_petugas AS id, nama_petugas AS nama, username, telp, level FROM petugas
						UNION
						SELECT nik AS id, nama, username, telp, telp AS level FROM masyarakat ORDER BY nama LIMIT 10";
		}
		
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