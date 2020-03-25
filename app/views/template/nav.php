<nav>
	<div>
		<a href="<?= BASEURL ?>" class="logo">
			<img src="<?= BASEURL ?>/assets/img/icon/logo.png">LAPOR!
		</a>
		<div class="menu">
			<a href="<?= BASEURL ?>/beranda" <?= ($data['controller'] === 'Beranda') ? 'class="active"' : '' ?>>BERANDA</a>
			<a href="<?= BASEURL ?>/formulir-pengaduan" <?= ($data['controller'] === 'Formulir_pengaduan') ? 'class="active"' : '' ?>>FORMULIR PENGADUAN</a>
			<div class="unlogged">
				<a href="<?= BASEURL ?>/login">LOGIN</a>
				<a href="<?= BASEURL ?>/daftar">DAFTAR</a>
			</div>
		</div>
	</div>
</nav>