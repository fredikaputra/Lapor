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
		<nav>
			<div>
				<a class="logo" href="<?= BASEURL ?>">LAPOR!</a>
				<div>
					<div>
						<button type="button" class="bg-rounded bg-primary" onclick="showmodallogin()">Masuk</button>
						<button type="button" class="bg-rounded" onclick="showmodalsignup()">Daftar</button>
					</div>
					<a class="bg-rounded bg-primary" href="<?= BASEURL ?>/logout">Logout</a>
				</div>
			</div>
		</nav>