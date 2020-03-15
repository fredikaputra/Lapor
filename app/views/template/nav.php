<nav>
	<div>
		<a href="<?= BASEURL ?>">
			<img src="<?= BASEURL ?>/assets/img/icon/blue-logo.png" alt="">LAPOR!
		</a>
		<div>
			<a href="<?= BASEURL ?>/beranda">BERANDA</a>
			<a href="<?= BASEURL ?>/formulir-pengaduan">FORMULIR PENGADUAN</a>
			<?php
			
			if (isset($_SESSION['masyarakatNIK']) || isset($_SESSION['petugasID'])) {
				?>
				
				<div class="logged">
					<a href="<?= BASEURL ?>/login">LOGIN</a>
				</div>
				
				<?php
			}else{
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