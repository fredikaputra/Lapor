<?php

class Dashboard extends Controller{
	public function index(){
		$data['title'] = 'Dashboard';
		$data['css'] = ['dashboard.css'];
		$this->view('template/header', $data);
		$this->view('dashboard/index');
	}
}