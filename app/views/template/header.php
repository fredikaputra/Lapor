<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $data['webtitle'] ?></title>
		
		<link rel="icon" href="<?= BASEURL ?>/assets/img/icon/blue-logo.png">
		
		<?php
		
		if (isset($data['css'])) {
			foreach($data['css'] as $css){
				?><link rel="stylesheet" href="<?= BASEURL ?>/assets/css/<?= $css ?>"><?php
			}
		}
		
		?>
	</head>
	<body>
		
		<?= Flasher::flash() ?>