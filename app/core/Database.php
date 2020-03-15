<?php

class Database{
	private $db_host = DB_HOST;
	private $db_user = DB_USER;
	private $db_pass = DB_PASS;
	private $db_name = DB_NAME;
	public $dbh, $sth, $row, $result;
	
	public function __construct(){
		$this->dbh = @new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		
		if ($this->dbh->connect_errno) {
			die('Connection Failed!');
		}
		
		return $this->dbh;
	}
	
	public function prepare($query){
		if ($this->dbh->prepare($query)) {
			$this->sth = $this->dbh->prepare($query);
		}else{
			die('Query error: ' . $this->dbh->error);
		}
	}
	
	public function execute(){
		$this->sth->execute();
	}
	
	public function getResult(){
		$this->result = $this->sth->get_result();
		
		while ($this->row = $this->result->fetch_assoc()) {
			return $this->row;
		}
	}
	
	public function affectedRows(){
		return $this->dbh->affected_rows;
	}
}