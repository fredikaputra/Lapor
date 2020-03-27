<!DOCTYPE html>
<html lang="id">
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
		
		<style type="text/css" media="print">
			nav, main header, .action, .content > div:first-of-type{
				display: none !important;
			}
			
			main .content > div:last-child, body{
				grid-template-columns: 1fr;
			}
			
			main{
				grid-template-rows: 1fr;
			}
		</style>
		<link rel="icon" href="<?= BASEURL ?>/assets/img/icon/logo.png">
	</head>
	<body>
		
		<?= Flasher::flash() ?>