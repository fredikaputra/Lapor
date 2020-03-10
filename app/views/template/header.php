<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<!-- meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?= $data['title'] ?></title>
		
		<!-- css -->
		<?php
		
		foreach ($data['css'] as $css) {
			?><link rel="stylesheet" href="<?= BASEURL ?>/assets/css/<?= $css ?>"><?php
		}
		
		?>
	</head>
	<body>
		
		<?= Flasher::flash() ?>