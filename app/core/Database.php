<?php

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $name = DB_NAME;
	public $dbh;
	private $sth;
	public $row;
	
	public function connect(){
		$this->dbh = @new mysqli($this->host, $this->user, $this->pass, $this->name);
		
		if (mysqli_connect_errno()) {
			die("Connection failed: " . mysqli_connect_error());
			exit();
		}
		return $this->dbh;
	}
	
	public function query($query){
		if ($this->connect()->query($query)) {
			$this->sth = $this->connect()->query($query);
		}else {
			die($this->viewErr());
		}
	}
	
	public function resultSet(){
		$this->row = $this->sth->fetch_assoc();
	}
	
	public function rowCount(){
		return $this->dbh->affected_rows;
	}
	
	public function viewErr(){
		echo "Error description: " . $this->dbh->error;
	}
}