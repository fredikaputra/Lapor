<nav>
	<?php
	
	if (file_exists('assets/img/users/' . $data['photo'])) {
		?><img src="<?= BASEURL ?>/assets/img/users/<?= $data['photo'] ?>" alt=""><?php
	}else {
		?><?php
	}
	
	?>
	<span class="name"><?= $data['name'] ?></span>
	<span class="level"><?= ($data['privilege'] == 1) ? 'Admin' : 'Petugas' ?></span>
	<a href="">
		<img src="<?= BASEURL ?>/assets/img/icon/settings.png" alt="">
	</a>
	<a href="">
		<img src="<?= BASEURL ?>/assets/img/icon/bold-lock.png" alt="">
	</a>
	<a href="">
		<img src="<?= BASEURL ?>/assets/img/icon/logout.png" alt="">
	</a>
	
	<div class="menu">
		<div>
			<a href="<?= BASEURL ?>/dashboard" class="<?= ($data['activelink'] == 'dashboard') ? 'active' : '' ?>">Beranda <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
			<a href="<?= BASEURL ?>/dashboard/data-aduan" class="<?= ($data['activelink'] == 'dataaduan') ? 'active' : '' ?>">Data aduan <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
			<a href="<?= BASEURL ?>/pengguna" class="<?= ($data['activelink'] == 'pengguna') ? 'active' : '' ?>">Pengguna <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
		</div>
		<a href="<?= BASEURL ?>"> WEBSITE LAPOR!</a>
	</div>
</nav>

<main>
	<header>
		<span>Dashboard</span>
	</header>