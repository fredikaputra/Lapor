<?php

class Logout_model{
	public function __construct(){
		if (isset($logout)) {
			session_destroy();
		}
	}
}