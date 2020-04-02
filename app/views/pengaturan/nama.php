<header>
	<h1>Pengaturan</h1>
</header>
<main>
	<h2>Informasi Pribadi</h2>
	<span>Informasi dasar anda seperti nama dan foto.</span>
	<div>
		<a href="<?= BASEURL ?>/pengaturan">
			<img src="<?= BASEURL ?>/assets/img/icon/left-arrow.png" alt="">
		</a>
		<h3>Nama</h3>
		
		<form action="<?= BASEURL ?>/pengaturan/proccess" method="post">
			<input type="text"><button type="submit">Simpan</button>
		</form>
	</div>
</main>