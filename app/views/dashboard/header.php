<nav>
	<?php
	
	if (file_exists('assets/img/users/' . $data['photo'])) {
		?><img src="<?= BASEURL ?>/assets/img/users/<?= $data['photo'] ?>?=<?= filemtime('assets/img/users/' . $data['photo']) ?>"><?php
	}else {
		?><img src="<?= BASEURL ?>/assets/img/users/default.png" alt=""><?php
	}
	
	?>
	<span class="name"><?= $data['petugas']['nama_petugas'] ?></span>
	<span class="level"><?= ($data['petugas']['level'] == 1) ? 'Admin' : 'Petugas' ?></span>
	<a href="<?= BASEURL ?>/dashboard/pengaturan">
		<img src="<?= BASEURL ?>/assets/img/icon/light-setting.png" alt="">
	</a>
	<a href="<?= BASEURL ?>/dashboard/kunci">
		<img src="<?= BASEURL ?>/assets/img/icon/bold-lock.png" alt="">
	</a>
	<a href="<?= BASEURL ?>/logout">
		<img src="<?= BASEURL ?>/assets/img/icon/logout.png" alt="">
	</a>
	
	<div class="menu">
		<div>
			<a href="<?= BASEURL ?>/dashboard" class="<?= ($data['method'] == 'index') ? 'active' : '' ?>">Beranda <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
			<a href="<?= BASEURL ?>/dashboard/data-aduan" class="<?= ($data['method'] == 'data_aduan') ? 'active' : '' ?>">Data aduan <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
			<a href="<?= BASEURL ?>/dashboard/pengguna" class="<?= ($data['method'] == 'pengguna' || $data['method'] == 'tambah_pengguna') ? 'active' : '' ?>">Pengguna <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
			<?php
			
			if ($data['petugas']['level'] == 1) {
				?>
				
				<a href="<?= BASEURL ?>/dashboard/aktivitas-pengguna" class="<?= ($data['method'] == 'aktivitas_pengguna') ? 'active' : '' ?>">Aktifitas Pengguna <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				
				<?php
			}
			
			?>
			<a href="<?= BASEURL ?>/dashboard/pengaturan" class="<?= ($data['method'] == 'pengaturan') ? 'active' : '' ?>">Pengaturan <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
		</div>
		<a href="<?= BASEURL ?>"> WEBSITE LAPOR!</a>
	</div>
</nav>

<main>
	<header>
		<span>Dashboard</span>
	</header>
	
	<script type="text/javascript">
		var timeout;

		timeout = setTimeout(function(){
			window.location.href = "<?= BASEURL ?>/dashboard/kunci";
		}, 180000);

		document.onmousemove = function(){
			clearTimeout(timeout);
			timeout = setTimeout(function(){
				window.location.href = "<?= BASEURL ?>/dashboard/kunci";
			}, 180000);
		}

		document.onkeydown = function(){
			clearTimeout(timeout);
			timeout = setTimeout(function(){
				window.location.href = "<?= BASEURL ?>/dashboard/kunci";
		}, 180000);
		}
	</script>