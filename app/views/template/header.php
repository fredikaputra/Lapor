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
				
				<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/<?= $css ?>?=<?= filemtime('assets/css/' . $css) ?>">
				
				<?php
			}
		}
		
		?>
		
		<style type="text/css" media="print">
			*{
				overflow: hidden !important;
			}
			
			nav, main header, .action, .content > div:first-of-type{
				display: none !important;
			}
			
			main .content > div:last-child, body{
				grid-template-columns: 1fr;
			}
			
			main{
				overflow: hidden !important;
				grid-template-rows: 1fr;
			}
		</style>
		<link rel="icon" href="<?= BASEURL ?>/assets/img/icon/logo.png?=<?= filemtime('assets/img/icon/logo.png') ?>">
	</head>
	<body onbeforeunload="<?= (isset($_SESSION['msg']) || isset($_SESSION['reg'])) ? 'return true;' : '' ?>">
		
		<?= Flasher::flash() ?>