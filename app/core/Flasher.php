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
			echo '<div class="alert" id="alert">
					<span class="' . $_SESSION['flash']['class'] . '">' . $_SESSION['flash']['msg'] . '</span>
				</div>
				<script src="' . BASEURL . '/assets/js/setTimeout.js"></script>';
			unset($_SESSION['flash']);
		}
	}
}