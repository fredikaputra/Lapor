<?php

class Database{
	private $db_host = DB_HOST;
	private $db_user = DB_USER;
	private $db_pass = DB_PASS;
	private $db_name = DB_NAME;
	public $dbh, $sth, $row, $result;
	
	public function __construct(){
		// koneksi
		$this->dbh = @new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		
		if ($this->dbh->connect_errno) { // ketika koneksi gagal
			die('Connection Failed!'); // tampilkan error
		}
		
		return $this->dbh;
	}
	
	public function prepare($query){
		if ($this->dbh->prepare($query)) { // ketika query benar
			$this->sth = $this->dbh->prepare($query); // buat variable statement handle
		}else{
			// var_dump($this->dbh->error);
			die('Query error!');
		}
	}
	
	public function execute(){
		$this->sth->execute(); // eksekusi querynya
	}
	
	public function getResult(){ // tampilkan data dari database
		$this->result = $this->sth->get_result();
		
		while ($this->row = $this->result->fetch_assoc()) {
			return $this->row;
		}
	}
	
	public function affectedRows(){ // tampilkan int indikasi query jalan atau tidak
		if (!$this->dbh->error) {
			return $this->dbh->affected_rows;
		}else {
			// var_dump($this->dbh->error);
			die('Query error!');
		}
	}
}