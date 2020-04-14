<?php

class Logout_model{
	public function __construct(){
		
		// buat log
		$log  = time() . PHP_EOL;

		// simpan log
		if (isset($_SESSION['petugasID'])) {
			$createLog = file_put_contents('app/log/last_login/' . $_SESSION['petugasID'] . '.log', $log);
		}else if (isset($_SESSION['masyarakatNIK'])) {
			$createLog = file_put_contents('app/log/last_login/' . $_SESSION['masyarakatNIK'] . '.log', $log);
		}
		session_destroy();
	}
}