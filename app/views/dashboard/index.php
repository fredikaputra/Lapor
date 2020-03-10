		<div class="sidebar">
			<div class="profile">
				<img src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
				<span>I Putu Fredika Putra</span>
				<span>Admin</span>
				<div>
					<a href="<?= BASEURL ?>">
						<img src="<?= BASEURL ?>/assets/img/icon/gear.png" alt="">
					</a>
					<a href="<?= BASEURL ?>">
						<img src="<?= BASEURL ?>/assets/img/icon/logout.png" alt="">
					</a>
				</div>
			</div>
			<nav>
				<a href="<?= BASEURL ?>">Dashboard <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="<?= BASEURL ?>">Laporan Pengaduan <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="<?= BASEURL ?>">Pengguna <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
			</nav>
		</div>
		<div class="content">
			<div class="topnav">
				<a href="<?= BASEURL ?>">Dashboard</a>
				<div>Lapor / Dashboard</div>
			</div>
			<main>
				<div>
					
				</div>
				<div></div>
			</main>
		</div>
		
		<?php
		
		if (isset($data['js'])) {
			foreach ($data['js'] as $js) {
				?><script src="<?= BASEURL ?>/assets/js/<?= $js ?>"></script><?php
			}
		}
		
		?>
		
	</body>
</html>