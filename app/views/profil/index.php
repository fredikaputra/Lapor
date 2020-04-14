<header>
	<h1>Profil</h1>
</header>
<main>
	<h2>Informasi Pribadi</h2>
	<span>Informasi dasar anda seperti nama dan foto.</span>
	<div>
		<h3>Profil</h3>
		<span>Beberapa informasi dapat dilihat oleh pengguna lainnya saat menggunakan layanan Lapor! <a href="">Pelajari lebih lanjut.</a></span>
		
		<div class="row">
			<a href="<?= BASEURL ?>/profil/sunting/foto-profil">
				<span>FOTO</span>
				<strong>Gambar Anda</strong>
				<?php
				
				if (file_exists('assets/img/users/' . $data['photo'])) {
					?><img src="<?= BASEURL ?>/assets/img/users/<?= $data['photo'] ?>?=<?= filemtime('assets/img/users/' . $data['photo']) ?>"><?php
				}else {
					?><img src="<?= BASEURL ?>/assets/img/users/default.png"><?php
				}
				
				?>
			</a>
			<div>
				<span>NIK</span>
				<strong><?= $data['nik'] ?></strong>
				<img src="<?= BASEURL ?>/assets/img/icon/circle-padlock.png" title="Nomor NIK tidak dapat diubah!">
			</div>
			<a href="<?= BASEURL ?>/profil/sunting/nama">
				<span>NAMA</span>
				<strong><?= $data['name'] ?></strong>
				<img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png">
			</a>
			<a href="<?= BASEURL ?>/profil/sunting/username">
				<span>USERNAME</span>
				<strong>@<?= $data['username'] ?></strong>
				<img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png">
			</a>
			<a href="<?= BASEURL ?>/profil/sunting/telepon">
				<span>TELEPON</span>
				<strong><?= $data['phone'] ?></strong>
				<img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png">
			</a>
			<a href="<?= BASEURL ?>/profil/sunting/password">
				<span>PASSWORD</span>
				<div>
					&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;
					<?php
					
					if ($handle = opendir('app/log/change_pass_time')) {
						while (false !== ($file = readdir($handle))) {
							if ($file != "." && $file != "..") {
								$cekNIK = explode('.', $file);
								if ($cekNIK[0] == $_SESSION['masyarakatNIK']) {
									$files[] = file('app/log/change_pass_time/' . $file);
								}
							}else {
								$files = NULL;
							}
						}
						closedir($handle);
					}
					
					
					if ($files != NULL) {
						foreach ($files as $line) {
							foreach ($line as $activity) {
								$part = explode('|', $activity);
								?><strong>Terakhir diubah <?= strftime("%A, %d %B %Y %H:%M", intval($part[1])) ?></strong><?php
							}
						}
					}
					
					?>
				</div>
				<img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png">
			</a>
		</div>
	</div>
</main>