<?php

class Lapor extends Controller{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function index(){
		if (isset($_SESSION['masyarakatNIK'])) {
			$nik = $_SESSION['masyarakatNIK'];
			$query = "SELECT * FROM masyarakat WHERE nik = '$nik'";
			
			$this->db->query($query);
			$this->db->resultSet();
			$data['masyarakat_name'] = $this->db->row['nama'];
		}else {
			$data['modalstyle'] = 'class="show"';
			$data['masyarakat_name'] = '-';
		}
		$data['title'] = 'Lapor! - Sampaikan Aspirasi Anda';
		$data['css'] = 'lapor.css';
		
		$this->view('template/head', $data);
		$this->view('lapor/index', $data);
		$this->view('template/foot', $data);
	}
}