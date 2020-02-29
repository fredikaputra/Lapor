<?php

class Database{
	private $db_host = DB_HOST, $db_user = DB_USER, $db_pass = DB_PASS, $db_name = DB_NAME;
	public $dbh, $sth, $row;
	private $result;
	
	public function __construct(){
		// create connection to database
		$this->dbh = @new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		
		// check connection
		if ($this->dbh->connect_errno) {
			die('Failed to connect to MySQL: ' . $this->dbh->connect_error);
			exit();
		}
		
		return $this->dbh;
	}
	
	// prepared statement
	public function preparedStatement($query){
		// check if query is correct
		if ($this->dbh->prepare($query)) {
			$this->sth = $this->dbh->prepare($query);
		}else {
			die($this->viewErr());
		}
	}
	
	// execute query
	public function executeQuery(){
		$this->sth->execute();
	}
	
	// get result
	public function getResult(){
		$this->result = $this->sth->get_result();
		// return all data from database
		while ($this->row = $this->result->fetch_assoc()) {
			return $this->row;
		}
	}
	
	// return value of query insert update delete
	public function affectedRows(){
		return $this->dbh->affected_rows;
	}
	
	// show error from query
	public function viewErr(){
		echo "Query error: " . $this->dbh->error;
	}
}