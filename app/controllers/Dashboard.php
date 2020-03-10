<?php

class Dashboard extends Controller{
	public function index(){
		$data['css'] = ['base.css', 'dashboard.css'];
		$data['title'] = 'Dashboard';
		$data['js'] = ['outline.js'];
		
		$this->view('template/header', $data);
		$this->view('dashboard/index', $data);
	}
}