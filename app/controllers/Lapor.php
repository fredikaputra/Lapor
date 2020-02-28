<?php

class Lapor extends Controller{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function index(){
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['masyarakat_name'] = $this->model('SelectDataFromDB_model')->selectMasyarakatName($_SESSION['masyarakatNIK']);
		}else {
			$data['masyarakat_name'] = '-';
			$data['modalstyle'] = 'class="show"';
		}
		$data['title'] = 'Lapor! - Sampaikan Aspirasi Anda';
		$data['css'] = 'lapor.css';
		
		$this->view('template/head', $data);
		$this->view('lapor/index', $data);
		$this->view('template/foot', $data);
	}
}