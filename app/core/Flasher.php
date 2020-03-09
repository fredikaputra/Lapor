<?php

class Flasher{
	public static function setFlash($msg, $class, $img){
		$_SESSION['flash'] = [
			'msg' => $msg,
			'class' => $class,
			'img' => $img
		];
	}
	
	public static function flash(){
		if (isset($_SESSION['flash'])) {
			echo '<div id="notif">
				<span class="notif ' . $_SESSION['flash']['class'] . ' bg-rounded">' . $_SESSION['flash']['msg'] . '</span>
				<img src="' . BASEURL . '/assets/img/icon/' . $_SESSION['flash']['img'] . '.png" class="' . $_SESSION['flash']['class'] . '">
				<span class="effect"></span>
			</div>
			<script src="' . BASEURL . '/assets/js/flasher.js"></script>';
			unset($_SESSION['flash']);
		}
	}
}