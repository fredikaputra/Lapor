<?php

class Controller{
	
	// untuk menampilkan website
	public function view($view, $data = []){
		require_once 'app/views/' . $view . '.php';
	}
	
	// untuk menggunakan menggunakan fungsi proses
	public function model($model, $data = ''){
		require_once 'app/models/' . $model . '.php';
		return new $model($data);
	}
}