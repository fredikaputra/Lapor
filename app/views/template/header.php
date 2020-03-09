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
		
		<nav>
			<div>
				<a class="logo" href="<?= BASEURL ?>">LAPOR!</a>
				<div>
					<?php
					
					if (isset($_SESSION['masyarakatNIK'])) {
						?><a class="bg-rounded bg-primary" href="<?= BASEURL ?>/logout">Logout</a><?php
					}else {
						?>
						
						<div>
							<button type="button" class="bg-rounded bg-primary" onclick="showmodallogin()">Masuk</button>
							<button type="button" class="bg-rounded" onclick="showmodalsignup()">Daftar</button>
						</div>
						
						<?php
					}
					
					?>
				</div>
			</div>
		</nav>