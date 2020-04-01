<?php

class Database{
	private $db_host = DB_HOST;
	private $db_user = DB_USER;
	private $db_pass = DB_PASS;
	private $db_name = DB_NAME;
	public $dbh, $sth, $row;
	
	public function __construct(){ // koneksi
		$this->dbh = @new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		
		if ($this->dbh->connect_errno) { // jika koneksi gagal
			die('Database connection failed!');
		}
		
		return $this->dbh;
	}
	
	public function prepare($query){
		if ($this->dbh->prepare($query)) {
			$this->sth = $this->dbh->prepare($query);
		}else { // jika query salah
			// echo $this->dbh->error;
			die("<br /><strong>Fatal Error</strong>: Query error!");
		}
	}
	
	public function execute(){
		$this->sth->execute();
	}
	
	public function getResult(){
		$this->result = $this->sth->get_result();
		
		while ($row = $this->result->fetch_assoc()) {
			$this->row[] = $row;
		}
		return $this->row;
	}
	
	public function affectedRows(){
		return $this->dbh->affected_rows;
	}
}