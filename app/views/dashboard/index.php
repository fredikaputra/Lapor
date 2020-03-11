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
		
		<script>
			var timeout;
			
			timeout = setTimeout(function(){
				window.location.href = "<?= BASEURL ?>/dashboard/user-locked";
			}, 180000);
			
			document.onmousemove = function(){
				clearTimeout(timeout);
				timeout = setTimeout(function(){
					window.location.href = "<?= BASEURL ?>/dashboard/user-locked";
				}, 180000);
			}
			
			document.onkeydown = function(){
				clearTimeout(timeout);
				timeout = setTimeout(function(){
					window.location.href = "<?= BASEURL ?>/dashboard/user-locked";
				}, 180000);
			}
		</script>
		
	</body>
</html>