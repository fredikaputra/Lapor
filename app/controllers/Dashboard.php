<?php

class Dashboard extends Controller{	
	public function riwayat_aduan(){
		$data['webtitle'] = 'Dashboard - Riwayat Aduan';
		$data['css'] = ['mas_riwayat_aduan.css', 'nav.css', 'base.css'];
		$data['controller'] = __CLASS__;
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('dashboard/mas_riwayat_aduan');
		$this->view('template/footer');
	}
}