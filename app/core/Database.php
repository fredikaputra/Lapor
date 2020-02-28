<?php

class Database{
	private $db_host = DB_HOST;
	private $db_user = DB_USER;
	private $db_pass = DB_PASS;
	private $db_name = DB_NAME;
	private $dbh;
	private $sth;
	private $row;
	
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
	
	public function query($query){
		$this->sth = $this->dbh->prepare($query);
	}
	
	public function execute(){
		$this->sth->execute();
	}
	
	public function showResult(){
		$this->sth->fetch_assoc();
	}
}