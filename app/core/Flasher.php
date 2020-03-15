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
			echo '<div class="notif">
				<span class="' . $_SESSION['flash']['class'] . '">' . $_SESSION['flash']['msg'] . '</span>
				<div></div>
				<img class="' . $_SESSION['flash']['class'] . '" src="' . BASEURL . '/assets/img/icon/' . $_SESSION['flash']['img'] . '">
			</div>
			
			<script type="text/javascript">
				setTimeout(function(){
					document.querySelector(".notif").classList.add("hide");
				}, 8000);
			</script>';
			unset($_SESSION['flash']);
		}
	}
}