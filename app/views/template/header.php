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
		<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/loader.css?=<?= filemtime('assets/css/loader.css') ?>">
		
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
		
		<div id="loader" <?= (isset($_SESSION['loadingscreen'])) ? '' : 'class="hide"' ?>>
			<div>
				<img src="<?= BASEURL ?>/assets/img/icon/dark-setting.png">
				<span>Memproses data...</span>
			</div>
		</div>
		
		<script type="text/javascript">			
			window.addEventListener("load", function(){
				document.querySelector("form").onsubmit = function(){
					document.querySelector("#loader").classList.remove('hide');
				}
			});
		</script>
		
		<?php
		
		if (isset($_SESSION['loadingscreen'])) {
			unset($_SESSION['loadingscreen']);
			
			?>
			
			<script type="text/javascript">			
				window.addEventListener("load", function(){
					document.querySelector("#loader").classList.add('hide');
				});
			</script>
			
			<?php
		}
		
		Flasher::flash()
		
		?>