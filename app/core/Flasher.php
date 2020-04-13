<?php

class Flasher{
	
	// fungsi untuk membuat
	// notifikasi
	public static function setFlash($subj, $msg, $class, $img){
		$_SESSION['flash'] = [
			'subj' => $subj,
			'msg' => $msg,
			'class' => $class,
			'img' => $img
		];
	}
	
	// fungsi untuk menampilkan
	// notifikasi
	public static function flash(){
		if (isset($_SESSION['flash'])) {
			echo '<div id="alert">
				<span id="' . $_SESSION['flash']['class'] . '-alert"><strong>' . $_SESSION['flash']['subj'] . '</strong>' . $_SESSION['flash']['msg'] . '</span>
				<img id="' . $_SESSION['flash']['class'] . '-alert" src="' . BASEURL . '/assets/img/icon/' . $_SESSION['flash']['img'] . '.png">
				<div></div>
			</div>
			<script src="' . BASEURL . '/assets/js/flasher.js"></script>';
			unset($_SESSION['flash']);
		}
	}
}