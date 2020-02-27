<?php

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $name = DB_NAME;
	public $dbh;
	
	public function connect(){
		$this->dbh = @new mysqli($this->host, $this->user, $this->pass, $this->name);
		
		if (mysqli_connect_errno()) {
			die("Connection failed " . mysqli_connect_error());
			exit();
		}
		return $this->dbh;
	}
}