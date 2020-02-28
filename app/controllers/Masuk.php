<?php

class Masuk extends Controller{
	public function index(){
		// use model login
		$this->model('Login_model')->login($_POST);
	}
}