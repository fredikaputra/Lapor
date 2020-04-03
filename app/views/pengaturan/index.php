<header>
	<h1>Pengaturan</h1>
</header>
<main>
	<h2>Informasi Pribadi</h2>
	<span>Informasi dasar anda seperti nama dan foto.</span>
	<div>
		<h3>Profil</h3>
		<span>Beberapa informasi dapat dilihat oleh pengguna lainnya saat menggunakan layanan Lapor! <a href="">Pelajari lebih lanjut.</a></span>
		
		<div class="row">
			<a href="<?= BASEURL ?>/pengaturan/foto-profil">
				<span>FOTO</span>
				<strong>Gambar Anda</strong>
				<?php
				
				if (file_exists('assets/img/users/' . $data['photo'])) {
					?><img src="<?= BASEURL ?>/assets/img/users/<?= $data['photo'] ?>" alt=""><?php
				}else {
					?><img src="<?= BASEURL ?>/assets/img/users/default.png" alt=""><?php
				}
				
				?>
			</a>
			<a href="">
				<span>NIK</span>
				<strong><?= $data['nik'] ?></strong>
				<img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt="">
			</a>
			<a href="<?= BASEURL ?>/pengaturan/nama">
				<span>NAMA</span>
				<strong><?= $data['name'] ?></strong>
				<img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt="">
			</a>
			<a href="<?= BASEURL ?>/pengaturan/username">
				<span>USERNAME</span>
				<strong>@<?= $data['username'] ?></strong>
				<img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt="">
			</a>
			<a href="<?= BASEURL ?>/pengaturan/telepon">
				<span>TELEPON</span>
				<strong><?= $data['phone'] ?></strong>
				<img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt="">
			</a>
			<a href="<?= BASEURL ?>/pengaturan/password">
				<span>PASSWORD</span>
				<div>
					&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;
					<strong>Terakhir diubah 25 Maret, 2002</strong>
				</div>
				<img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt="">
			</a>
		</div>
	</div>
</main>