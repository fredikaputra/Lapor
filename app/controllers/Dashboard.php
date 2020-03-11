<?php

class Dashboard extends Controller{
	public function index(){
		if (isset($_SESSION['petugasID'])) {
			$data['css'] = ['base.css', 'dashboard.css'];
			$data['title'] = 'Dashboard';
			$data['js'] = ['outline.js'];
			
			$this->view('template/header', $data);
			$this->view('dashboard/index', $data);
		}else {
			$this->lockscreen();
		}
	}
	
	public function lockscreen(){
		if (!isset($_SESSION['petugasUsername'])) {
			$_SESSION['petugasName'] = $this->model('GetData_model')->petugas($_SESSION['petugasID'])['nama_petugas'];
			$_SESSION['petugasUsername'] = $this->model('GetData_model')->petugas($_SESSION['petugasID'])['username'];
			unset($_SESSION['petugasID']);
		}
		
		$data['nickname'] = $this->model('Nickname_model')->getName($_SESSION['petugasName']);
		$data['title'] = 'Locked';
		$data['css'] = ['base.css', 'lockscreen.css'];
		$data['js'] = ['outline.js'];
		
		$this->view('template/header', $data);
		$this->view('dashboard/lockscreen', $data);
	}
}