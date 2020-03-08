<?php

class Controller{
	// view controller
	public function view($view, $data = []){
		require_once 'app/views/' . $view . '.php';
	}
	
	// model controller
	public function model($model, $data = ''){
		require_once 'app/models/' . $model . '.php';
		return new $model($data);
	}
}