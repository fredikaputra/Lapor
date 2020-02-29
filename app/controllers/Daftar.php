<?php

class Daftar extends Controller{
	public function index(){
		// use register model
		if ($this->model('Register_model')->register($_POST) === 'BACKTOSIGNUP') {
			$_SESSION['backtosignup'] = 'class="show"';
		}
		header('location: ' . BASEURL . '/lapor');
	}
}