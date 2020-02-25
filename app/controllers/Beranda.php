<?php

class Beranda extends Controller{
	public function index(){
		$this->view('template/head');
		$this->view('beranda/index');
		$this->view('template/foot');
	}
}