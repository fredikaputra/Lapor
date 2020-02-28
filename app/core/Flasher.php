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
			echo '<div class="alert">
					<span class="' . $_SESSION['flash']['class'] . '">' . $_SESSION['flash']['msg'] . '</span>
				</div>';
			unset($_SESSION['flash']);
		}
	}
}