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
				<span class="notif ' . $_SESSION['flash']['class'] . '" style="border-radius: 20px; padding: 7px 20px; font-size: 18px;">' . $_SESSION['flash']['msg'] . '</span>
				<img src="' . BASEURL . '/assets/img/icon/' . $_SESSION['flash']['img'] . '.png" class="' . $_SESSION['flash']['class'] . '">
				<span class="effect"></span>
			</div>
			<script src="' . BASEURL . '/assets/js/flasher.js"></script>';
			unset($_SESSION['flash']);
		}
	}
}