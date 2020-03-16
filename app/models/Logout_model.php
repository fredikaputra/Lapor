<?php

class Logout_model{
	public function logout(){
		session_destroy();
	}
}