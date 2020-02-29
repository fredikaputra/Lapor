<?php

class Lapor extends Controller{
	public function index(){
		// set data value
		$data['css'] = 'lapor.css';
		$data['title'] = 'Lapor! - Sampaikan Aspirasi Anda';
		
		// check if user is login set his or her name
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['masyarakat'] = [
				'name' => $this->model('GetDBData_model')->getMasyarakatName($_SESSION['masyarakatNIK'])
			];
		}else {
			$data['masyarakat'] = [
				'name' => '-'
			];
			$data['viewloginmodal'] = 'class="show"';
		}
		
		// use view
		$this->view('template/header', $data);
		$this->view('lapor/index', $data);
		$this->view('template/footer', $data);
	}
}