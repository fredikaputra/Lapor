<?php

class Data_model{
	private $db, $get;
	
	public function __construct(){
		$this->db = new Database;
		
		// cek query pada url (setelah tanda ?)
		$url = parse_url($_SERVER['REQUEST_URI']);
		if (isset($url['query'])) {
			$url = parse_url($_SERVER['REQUEST_URI'])['query'];
			$url = explode('&', $url);
			foreach($url as $key => $value) {
				if (strpos($value, '=') != FALSE) {
					$query = explode('=', $value);
					$this->get[$query[0]] = $query[1];
				}
			}
		}
	}
	
	// ambil data petugas
	public function petugas(){
		$query = "SELECT * FROM petugas WHERE id_petugas = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $_SESSION['petugasID']);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	// ambil data masyarakat
	public function masyarakat(){
		$query = "SELECT * FROM masyarakat WHERE nik = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $_SESSION['masyarakatNIK']);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	// ambil data pengaduan
	public function laporan($id = NULL, $nik = NULL, $limit = NULL){
		
		// tampilkan data laporan
		// dengan kondisi terfilter
		// ketika filter menyala
		if (isset($this->get['filter']) && $this->get['filter'] == 'on') {
			
			// rangkai query baru berdasarkan filter
			
			// ambil data laporan
			// yang memiliki gambar
			if ($this->get['gambar'] == '2') {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE foto IS NOT NULL";
			}
			
			// ambil data laporan
			// yang tidak memiliki gambar
			else if ($this->get['gambar'] == '1') {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE foto IS NULL";
			}
			
			// ambil data laporan
			// tanpa filter gambar
			else {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik)";
			}
			
			// beri kondisi status
			// jika filter gambar menyala
			if ($this->get['gambar'] == '1' || $this->get['gambar'] == '2') {
				
				// tampilkan data laporan
				// dengan status proses
				if ($this->get['status'] == '0') {
					$query .= " AND status = '0'";
				}
				
				// tampilkan data laporan
				// dengan status selesai
				else if ($this->get['status'] == '1') {
					$query .= " AND status = '1'";
				}
			}
			
			// beri kondisi status
			// jika filter gambar tidak menyala
			else {
				
				// tampilkan data laporan
				// dengan status proses
				if ($this->get['status'] == '0') {
					$query .= " WHERE status = '0'";
				}
				
				// tampilkan data laporan
				// dengan status selesai
				else if ($this->get['status'] == '1') {
					$query .= " WHERE status = '1'";
				}
			}
			
			// beri kondisi nik
			// ketika yang request filter
			// adalah masyarakat
			if (isset($_SESSION['masyarakatNIK'])) {
				if ($this->get['gambar'] == '1' || $this->get['gambar'] == '2'|| $this->get['status'] == '0'|| $this->get['status'] == '1') {
					$query .= " AND nik = '" . $_SESSION['masyarakatNIK'] . "'";
				}
				else {
					$query .= " WHERE nik = '" . $_SESSION['masyarakatNIK'] . "'";
				}
			}
			
			// tampilkan data laporan
			// dengan urutan data yang terbaru
			if ($this->get['urutan'] == '1') {
				$query .= " ORDER BY tgl_pengaduan DESC";
			}
			
			// tampilkan data laporan
			// dengan urutan data yang terlama
			else if ($this->get['urutan'] == '2') {
				$query .= " ORDER BY tgl_pengaduan ASC";
			}
			
			// tampilkan data laporan
			// dengan urutan nama A - Z
			else if ($this->get['urutan'] == '3') {
				$query .= " ORDER BY nama ASC";
			}
			
			// tampilkan data laporan
			// dengan urutan nama Z - A
			else if ($this->get['urutan'] == '4') {
				$query .= " ORDER BY nama DESC";
			}
			
			// tampilkan data laporan
			// dengan jumlah 10 data
			if ($this->get['tampil'] == '10') {
				$query .= " LIMIT 10";
			}
			
			// tampilkan data laporan
			// dengan jumlah 20 data
			else if ($this->get['tampil'] == '20') {
				$query .= " LIMIT 20";
			}
			
			// tampilkan data laporan
			// dengan jumlah 50 data
			else if ($this->get['tampil'] == '50') {
				$query .= " LIMIT 50";
			}
			
			$this->db->prepare($query);
		}
		
		// tampilkan data pengguna
		// berdasarkan kata kunci
		else if (isset($this->get['querysearch']) && $this->get['search'] == 'on') {
			
			// hilangkan tanda + pada pada query
			// yang kata kuncinya berasal dari url
			if (strpos($this->get['querysearch'], '+')) {
				$this->get['querysearch'] = str_replace('+', ' ', $this->get['querysearch']);
			}
			
			if (isset($_SESSION['masyarakatNIK'])) {
				$query = "SELECT * FROM pengaduan WHERE nik = '" . $_SESSION['masyarakatNIK'] . "' AND isi_laporan LIKE '%" . $this->get['querysearch'] . "%'";
			}
			else {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE isi_laporan LIKE '%" . $this->get['querysearch'] . "%' OR nama LIKE '%" . $this->get['querysearch'] . "%'";
			}
			
			$this->db->prepare($query);
		}
		
		// tampilkan semua data laporan
		// ketika filter tidak menyala
		else {
			
			// tampilkan data laporan
			// berdasarkan id laporan
			if ($id != NULL) {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE id_pengaduan = ?";
				$this->db->prepare($query);
				$this->db->sth->bind_param('s', $id);
			}
			
			// tampilkan data laporan
			// berdasarkan nik masyarakat
			else if ($nik != NULL) {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) WHERE nik = ? ORDER BY tgl_pengaduan DESC";
				$this->db->prepare($query);
				$this->db->sth->bind_param('s', $nik);
			}
			
			// tampilkan data laporan
			// dengan limit tertentu
			else if ($limit != NULL) {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) ORDER BY tgl_pengaduan DESC LIMIT ?";
				$this->db->prepare($query);
				$this->db->sth->bind_param('s', $limit);
			}
			
			// tampilkan semua data laporan
			else {
				$query = "SELECT pengaduan.*, nama FROM pengaduan JOIN masyarakat USING (nik) ORDER BY tgl_pengaduan DESC LIMIT 10";
				$this->db->prepare($query);
			}
		}
		
		// eksekusi query
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	// ambil data tanggapan
	public function tanggapan($id){
		$query = "SELECT tanggapan.*, nama_petugas, level FROM tanggapan JOIN petugas USING(id_petugas) WHERE id_pengaduan = ? ORDER BY tgl_tanggapan DESC";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	// ambil data pengguna
	public function pengguna(){
		
		// tampilkan data pengguna
		// ketika filter menyala
		if (isset($this->get['filter']) && $this->get['filter'] == 'on') {
			
			// rangkai query berdasarkan filter
			
			// ambil data pengguna
			// dengan ketentuan hak admin
			if ($this->get['hak'] == '1') {
				$query = "SELECT id_petugas as id, nama_petugas as nama, username, telp, level FROM petugas WHERE level = '1'";
			}
			
			// ambil data pengguna
			// dengan ketentuan hak petugas
			else if ($this->get['hak'] == '2') {
				$query = "SELECT id_petugas as id, nama_petugas as nama, username, telp, level FROM petugas WHERE level = '2'";
			}
			
			// ambil data pengguna
			// dengan ketentuan hak masyarakat
			else if ($this->get['hak'] == '3') {
				$query = "SELECT nik as id, nama, username, telp, telp as level FROM masyarakat";
			}
			
			// ambil semua data pengguna
			else {
				$query = "SELECT id_petugas AS id, nama_petugas AS nama, username, telp, level FROM petugas
							UNION
							SELECT nik AS id, nama, username, telp, telp AS level FROM masyarakat";
			}
			
			// ambil data pengguna
			// dengan urutan nama A - Z
			if ($this->get['urutan'] == '1') {
				$query .= " ORDER BY nama ASC";
			}
			
			// ambil data pengguna
			// dengan urutan nama Z - A
			else if ($this->get['urutan'] == '2') {
				$query .= " ORDER BY nama DESC";
			}
			
			// tampilkan data laporan
			// dengan jumlah 50 data
			if ($this->get['tampil'] == '50') {
				$query .= " LIMIT 50";
			}
			
			// tampilkan data laporan
			// dengan jumlah 75 data
			else if ($this->get['tampil'] == '75') {
				$query .= " LIMIT 75";
			}
			
			// tampilkan data laporan
			// dengan jumlah 100 data
			else if ($this->get['tampil'] == '100') {
				$query .= " LIMIT 100";
			}
		}
		
		// tampilkan data pengguna
		// berdasarkan kata kunci
		else if (isset($this->get['querysearch']) && $this->get['search'] == 'on') {
			
			// hilangkan tanda + pada kata query
			// yang berasal dari url
			if (strpos($this->get['querysearch'], '+')) {
				$this->get['querysearch'] = str_replace('+', ' ', $this->get['querysearch']);
			}
			
			$query = "SELECT id_petugas as id, nama_petugas as nama, username, telp, level FROM petugas WHERE nama_petugas LIKE '%" . $this->get['querysearch'] . "%' OR username LIKE '%" . $this->get['querysearch'] . "%'";
			$this->db->prepare($query);
			$this->db->execute();
			$this->db->getResult();
			
			$query = "SELECT nik as id, nama, username, telp, telp as level FROM masyarakat WHERE nama LIKE '%" . $this->get['querysearch'] . "%' OR username LIKE '%" . $this->get['querysearch'] . "%'";
		}
		
		// tampilkan semua pengguna
		else {
			$query = "SELECT id_petugas AS id, nama_petugas AS nama, username, telp, level FROM petugas
						UNION
						SELECT nik AS id, nama, username, telp, telp AS level FROM masyarakat ORDER BY nama LIMIT 20";
		}
		
		// eksekusi query
		$this->db->prepare($query);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row;
	}
	
	// ambil total data yang ada pada tabel
	public function tableRow($tb1, $tb2 = NULL, $cond = NULL){
		
		// tampilkan total data pada satu tabel
		$query = "SELECT COUNT(*) AS totalRows FROM $tb1";
		
		// tampilkan total data pada dua tabel
		if ($tb2 != NULL) {
			$query = "SELECT (SELECT COUNT(*) FROM $tb1 ) + (SELECT COUNT(*) FROM $tb2 ) AS totalRows";
		}
		
		// tampilkan total dengan kondisi tertentu
		if ($cond != NULL) {
			$query .= " WHERE $cond";
		}
		
		// eksekusi query
		$this->db->prepare($query);
		$this->db->execute();
		$this->db->getResult();
		return $this->db->row[0]['totalRows'];
	}
	
	// ambil data dengan format waktu
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
	
	// ambil data nama dari tabel petugas dan masyarakat
	public function getName($id){
		$query = "SELECT nik as id, nama as name FROM masyarakat WHERE nik = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			return $this->db->row;
		}else {
			$query = "SELECT id_petugas as id, nama_petugas as name FROM petugas WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			if ($this->db->getResult() > 0) {
				return $this->db->row;
			}
		}
	}
}