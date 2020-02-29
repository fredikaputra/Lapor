<?php

class Logout extends Controller{
	public function index(){
		// use logout model
		$this->model('Logout_model');
		header('location:' . BASEURL);
	}
}