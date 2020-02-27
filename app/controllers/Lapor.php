<?php

class Lapor extends Controller{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function index(){
		if (isset($_SESSION['masyarakatNIK'])) {
			$nik = $_SESSION['masyarakatNIK'];
			$query = mysqli_query($this->db->connect(), "SELECT * FROM masyarakat WHERE nik = '$nik'");
			$row = mysqli_fetch_assoc($query);
			$data['masyarakat_name'] = $row['nama'];
		}else {
			$data['modalstyle'] = 'class="show"';
			$data['masyarakat'] = '-';
		}
		$data['title'] = 'Lapor! - Sampaikan Aspirasi Anda';
		$data['css'] = 'lapor.css';
		
		$this->view('template/head', $data);
		$this->view('lapor/index', $data);
		$this->view('template/foot', $data);
	}
}