<?php

class Flasher{
	public static function setFlash($msg, $class){
		$_SESSION['flash'] = [
			'msg' => $msg,
			'class' => $class
		];
	}
	
	public static function flash(){
		if (isset($_SESSION['flash'])) {
			echo '<div id="notif">
				<span class="notif ' . $_SESSION['flash']['class'] . ' bg-rounded">' . $_SESSION['flash']['msg'] . '</span>
				<img src="' . BASEURL . '/assets/img/icon/attention.png" class="' . $_SESSION['flash']['class'] . '">
				<span class="effect"></span>
			</div>
			<script src="' . BASEURL . '/assets/js/flasher.js"></script>';
			unset($_SESSION['flash']);
		}
	}
}