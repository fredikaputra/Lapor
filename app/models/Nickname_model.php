<?php

class Nickname_model{
	public function getName($name){
		$name = explode(' ', $name);
		foreach($name as $value){
			if (strlen($value) > 2) {
				return $value;
			}
		}
		
		return implode(' ', $name);
	}
}