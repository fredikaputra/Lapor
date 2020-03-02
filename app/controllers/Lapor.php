<?php

class Lapor extends Controller{
	public function index(){
		// set data value
		$data['css'] = ['lapor.css', 'nav.css'];
		$data['title'] = 'Lapor! - Sampaikan Aspirasi Anda';
		
		// check if user is login set his or her name
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['masyarakat'] = [
				'name' => $this->model('GetDBData_model')->getMasyarakatData($_SESSION['masyarakatNIK'])['nama']
			];
		}else if (isset($_SESSION['petugasID'])) {
			$data['masyarakat'] = [
				'name' => '-'
			];
			if (isset($_SESSION['gotodashboard'])) {
				// die();
				$data['viewgotodashboard'] = $_SESSION['gotodashboard'];
				unset($_SESSION['gotodashboard']);
			}
		}else {
			$data['masyarakat'] = [
				'name' => '-'
			];
			if (isset($_SESSION['backtosignup'])) {
				$data['viewsignupmodal'] = $_SESSION['backtosignup'];
				unset($_SESSION['backtosignup']);
			}else {
				$data['viewloginmodal'] = 'class="show"';
			}
		}
		
		// use view
		$this->view('template/header', $data);
		$this->view('template/nav');
		$this->view('lapor/index', $data);
		$this->view('template/footer', $data);
	}
	
	public function tambah(){
		$this->model('InsertData_model')->addLaporan($_POST, $_FILES);
		header('location: ' . BASEURL . '/lapor');
	}
}