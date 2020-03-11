<?php

class Form_pengaduan extends Controller{
	public function index(){
		$data['title'] = 'LAPOR! - Sampaikan Aspirasi Anda';
		$data['css'] = ['base.css', 'formpengaduan.css', 'topnav.css'];
		$data['js'] = ['autoResize.js', 'outline.js', 'modal.js', 'ctrl_entr.js'];
		$data['modalsignup'] = 'hide';
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['modalsignin'] = 'hide';
			$data['name'] = $this->model('GetData_model')->autoMasyarakat()['nama'];
			$data['modalgotodash'] = 'hide';
		}else if(isset($_SESSION['petugasID'])){
			$data['modalsignin'] = 'hide';
			$data['name'] = '-';
		}else {
			$data['name'] = '-';
			$data['modalgotodash'] = 'hide';
		}
		
		$this->view('template/header', $data);
		$this->view('template/nav');
		$this->view('formpengaduan/index', $data);
		$this->view('template/footer', $data);
	}
	
	public function kirim(){
		if ($this->model('Insert_model')->pengaduan($_POST, $_FILES) === 'CONTINUE') {
			header('location:' . BASEURL . '/form-pengaduan');
		};
	}
}