<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title><?= $data['title'] ?></title>
		<link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style.css">
		<?php
		
		foreach ($data['css'] as $style) {
			?><link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/<?= $style ?>"><?php
		}
		
		?>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		
		<?= Flasher::flash() ?>