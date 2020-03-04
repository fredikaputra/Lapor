<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<!-- meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>LAPOR! - Layanan Pengaduan Masyarakat Online</title>
		
		<!-- css -->
		<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/beranda.css">
	</head>
	<body>
		<nav>
			<div>
				<a class="logo" href="<?= BASEURL ?>">LAPOR!</a>
				<div>
					<div>
						<button type="button" class="bg-rounded bg-primary" onclick="">Masuk</button>
						<button type="button" class="bg-rounded" onclick="">Daftar</button>
					</div>
					<a class="bg-rounded bg-primary" href="<?= BASEURL ?>/logout">Logout</a>
				</div>
			</div>
		</nav>
		
		<header>
			<h1>Layanan Pengaduan Masyarakat Online LAPOR!</h1>
			<a class="bg-rounded bg-primary" href="<?= BASEURL ?>/form-pengaduan">LAPOR!</a>
		</header>
		
		<section id="about">
			<h2>Kami Peduli</h2>
			<span>Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</span>
			<p>LAPOR! dibentuk untuk merealisasikan kebijakan “no wrong door policy” yang menjamin hak masyarakat agar pengaduan dari manapun dan jenis apapun akan disalurkan kepada penyelenggara pelayanan publik yang berwenang menanganinya. Hal ini bertujuan untuk dapat mengelola pengaduan dari masyarakat secara sederhana, cepat, tepat, tuntas, dan terkoordinasi dengan baik dan dapat meningkatkan kualitas pelayanan publik.</p>
		</section>
		
		<section id="report">
			<div>
				<div>
					<h2>Laporan Tercatat</h2>
					<span>530.000</span>
				</div>
				<div>
					<h2>Pelapor</h2>
					<span>230.000</span>
				</div>
				<div>
					<h2>Laporan Terealisasikan</h2>
					<span>430.000</span>
				</div>
			</div>
		</section>
		
		<footer>
			<a class="logo" href="<?= BASEURL ?>">LAPOR!</a>
			<span>Kami membantu anda untuk menyalurkan aspirasi anda kepada instansi yang berwenang demi tercapainya kepuasan anda.</span>
			<div>
				<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-facebook.png" alt=""></a>
				<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-instagram.png" alt=""></a>
				<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-twitter.png" alt=""></a>
				<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-youtube.png" alt=""></a>
			</div>
		</footer>
	</body>
</html>