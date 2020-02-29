<?php

class InsertData_model{
	private $db;
	private $query;
	private $id;
	private $time;
	private $status = '0';
	
	// call database
	public function __construct(){
		$this->db = new Database;
	}
	
	// insert laporan proccess
	public function addLaporan($data){
		extract($data);
		//gerenate uniq id
		do {
			$this->id = strtoupper('lprid' . substr(md5(uniqid()), 25));
		} while ($this->uniqIdCheck($this->id) > 1); // check if uniq id is available
		
		$this->time = time();
		$this->query = "INSERT INTO pengaduan VALUES(?, ?, ?, ?, ?, ?, ?)";
		$this->db->preparedStatement($this->query);
		$this->db->sth->bind_param('siissss', $this->id, $this->time, $_SESSION['masyarakatNIK'], $perihal, $laporan, $photo, $this->status);
		$this->db->executeQuery();
		if ($this->db->affectedRows() > 0) {
			Flasher::setFlash('Laporan anda berhasil dikirim!', 'success');
		}else {
			Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'danger');
		}
	}
	
	// check if uniqid is exists in database
	public function uniqIdCheck($id){
		$this->query = "SELECT * FROM pengaduan WHERE id_pengaduan = ?";
		$this->db->preparedStatement($this->query);
		$this->db->sth->bind_param('s', $id);
		$this->db->executeQuery();
		return $this->db->getResult();
	}
}