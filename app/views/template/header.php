<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<!-- meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- title -->
		<title><?= $data['webtitle'] ?></title>
		
		<!-- css -->
		<?php
		
		if (isset($data['css'])) {
			foreach($data['css'] as $css){
				?>
				
				<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/<?= $css ?>">
				
				<?php
			}
		}
		
		?>
		<link rel="icon" href="<?= BASEURL ?>/assets/img/icon/logo.png">
	</head>
	<body>