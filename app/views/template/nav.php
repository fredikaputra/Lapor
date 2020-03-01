<nav>
	<div class="width">
		<div class="left">
			<a href="<?= BASEURL; ?>">LAPOR!</a>
		</div>
		<div class="right">
			<a href="<?= BASEURL ?>/tentang" class="menu">Tentang</a>
			<a href="<?= BASEURL ?>/hubungi-kami" class="menu">Hubungi Kami</a>
			<?php
			// check if user session id is isset
			if (isset($_SESSION['masyarakatNIK'])) {
				?>
				<a href="<?= BASEURL ?>/logout" class="signin">Logout</a>
				<?php
			}else { // session id not isset
				?>
				<a href="javascript:void(0)" class="signin" id="signin">Masuk</a>
				<a href="javascript:void(0)" class="signup" id="signup">Daftar</a>
				<?php
			}
			?>
		</div>
	</div>
</nav>