<?php

class Dashboard extends Controller{
	public function index(){
		$data['row'] = $this->model('GetDBData_model')->getMasyarakatData($_SESSION['masyarakatNIK']);
		
		$data['title'] = 'Dashboard';
		$data['css'] = ['dashboard.css'];
		$this->view('template/header', $data);
		$this->view('dashboard/index', $data);
	}
}