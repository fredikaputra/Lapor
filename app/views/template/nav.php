<nav>
	<div>
		<a href="<?= BASEURL ?>" class="logo">
			<img src="<?= BASEURL ?>/assets/img/icon/logo.png">LAPOR!
		</a>
		<div class="menu">
			<a href="<?= BASEURL ?>/beranda" <?= ($data['controller'] === 'Beranda') ? 'class="active"' : '' ?>>BERANDA</a>
			<a href="<?= BASEURL ?>/formulir-pengaduan" <?= ($data['controller'] === 'Formulir_pengaduan') ? 'class="active"' : '' ?>>FORMULIR PENGADUAN</a>
			<?php
			
			if (isset($_SESSION['masyarakatNIK']) || isset($_SESSION['petugasID'])) {
				?>
				
				<div class="logged">
					<button type="button" onclick="toggleAccPan()">
						<img src="<?= BASEURL ?>/assets/img/user/user.png">
						<?= $data['name'] ?>
					</button>
					
					<div class="user-menu hide">
						<a href="<?= BASEURL ?>/dashboard/pengaturan" class="sett">
							<img src="<?= BASEURL ?>/assets/img/icon/settings.png">
						</a>
						<img src="<?= BASEURL ?>/assets/img/user/user.png">
						<a href="<?= BASEURL ?>/dashboard/pengaturan/foto-profil" class="change">
							<img src="<?= BASEURL ?>/assets/img/icon/camera.png">
						</a>
						<span class="name"><?= $data['name'] ?></span>
						<span class="username">@<?= $data['username'] ?></span>
						<?php
						
						if (isset($_SESSION['petugasID'])) {
							?>
							
							<a href="<?= BASEURL ?>/dashboard">Dashboard</a>
							
							<?php
						}else if (isset($_SESSION['masyarakatNIK'])) {
							?>
							
							<a href="<?= BASEURL ?>/dashboard/riwayat-aduan">Riwayat Aduan</a>
							
							<?php
						}
						
						?>
						<hr>
						<a href="<?= BASEURL ?>/logout">Logout</a>
					</div>
				</div>
				
				<?php
			}else {
				?>
				
				<div class="unlogged">
					<a href="<?= BASEURL ?>/login">LOGIN</a>
					<a href="<?= BASEURL ?>/daftar">DAFTAR</a>
				</div>
				
				<?php
			}
			
			?>
		</div>
	</div>
</nav>

<script type="text/javascript">
	function toggleAccPan(){
		document.querySelector('.user-menu').classList.toggle('hide');
	}
</script>