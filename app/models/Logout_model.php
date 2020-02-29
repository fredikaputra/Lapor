<?php

class Logout_model{	
	public function __construct(){
		session_destroy();
	}
}