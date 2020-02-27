<?php

class Lapor extends Controller{
	public function index(){
		if (!isset($_SESSION['userNIK'])) {
			$data['modalstyle'] = 'class="show"';
		}
		$data['title'] = 'Lapor! - Sampaikan Aspirasi Anda';
		$data['css'] = 'lapor.css';
		
		$this->view('template/head', $data);
		$this->view('lapor/index');
		$this->view('template/foot', $data);
	}
}