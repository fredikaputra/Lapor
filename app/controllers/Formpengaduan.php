<?php

class Formpengaduan extends Controller{
	public function index(){
		$data['title'] = 'LAPOR! - Sampaikan Aspirasi Anda';
		$data['css'] = ['base.css', 'formpengaduan.css'];
		$data['js'] = ['autoResize.js', 'outline.js', 'modal.js'];
		$data['modalsignup'] = 'hide';
		if (isset($_SESSION['masyarakatNIK'])) {
			$data['modalsignin'] = 'hide';
			$data['name'] = $this->model('GetData_model')->autoMasyarakat()['nama'];
		}else {
			$data['name'] = '-';
		}
		
		$this->view('template/header', $data);
		$this->view('formpengaduan/index', $data);
		$this->view('template/footer', $data);
	}
	
	public function kirim(){
		if ($this->model('Insert_model')->pengaduan($_POST, $_FILES) === 'CONTINUE') {
			header('location:' . BASEURL . '/form-pengaduan');
		};
	}
}