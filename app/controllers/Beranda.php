<?php

class Beranda extends Controller{
	public function index(){
		$data['title'] = 'LAPOR! - Layanan Pengaduan Masyarakat Online';
		$data['css'] = ['base.css', 'beranda.css', 'topnav.css'];
		$data['js'] = ['outline.js', 'modal.js'];
		$data['modalsignin'] = 'hide';
		$data['modalsignup'] = 'hide';
		$data['modalgotodash'] = 'hide';
		
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['name'] = $this->model('GetData_model')->autoMasyarakat()['nama'];
			$data['username'] = $this->model('GetData_model')->autoMasyarakat()['username'];
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav', $data);
		$this->view('beranda/index');
		$this->view('template/footer', $data);
	}
}