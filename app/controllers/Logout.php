<?php

class Logout extends Controller{
	public function index(){
		$this->model('Logout_model');
		header('location: ' . BASEURL);
	}
}