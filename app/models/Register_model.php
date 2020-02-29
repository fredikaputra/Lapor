<?php

class Register_model extends Controller{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function register($data){
		extract($data);
		
	}
}