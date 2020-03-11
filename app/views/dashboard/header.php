<div class="sidebar">
	<div class="profile">
		<img src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
		<span><?= $data['name'] ?></span>
		<span><?= $data['level'] ?></span>
		<div>
			<a href="<?= BASEURL ?>" title="Pengaturan">
				<img src="<?= BASEURL ?>/assets/img/icon/gear.png" alt="">
			</a>
			<a href="<?= BASEURL ?>/dashboard/user-locked" title="Lock Account">
				<img src="<?= BASEURL ?>/assets/img/icon/bold-lock.png" alt="">
			</a>
			<a href="<?= BASEURL ?>/logout" title="Logout">
				<img src="<?= BASEURL ?>/assets/img/icon/logout.png" alt="">
			</a>
		</div>
	</div>
	<nav>
		<a href="<?= BASEURL ?>/dashboard">Dashboard <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
		<a href="<?= BASEURL ?>/dashboard/data-pengaduan">Data Pengaduan <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
		<a href="<?= BASEURL ?>/pengguna">Pengguna <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
	</nav>
</div>
<div class="content">
	<div class="topnav">
		<span><?= $data['dashboardtitle'] ?></span>
		<div><?= $data['breadcrumbs'] . ' ' . $data['link'] ?></div>
	</div>
	<main>