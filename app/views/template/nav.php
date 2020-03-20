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
					<button type="button" onclick="showmenu()">
						<img src="<?= BASEURL ?>/assets/img/user/a male.jpg" alt=""> Fredika Putra
					</button>
					<div id="menu-account" class="hide">
						<a href=""><img src="<?= BASEURL ?>/assets/img/icon/settings.png" alt=""></a>
						
						<div class="image">
							<img src="<?= BASEURL ?>/assets/img/user/a male.jpg" alt="">
							<a href="">
								<img src="<?= BASEURL ?>/assets/img/icon/camera.png" alt="">
							</a>
						</div>
						
						<span>I Putu Fredika Putra</span>
						<span>@fredikaputra</span>
						
						<a href="<?= BASEURL ?>/riwayat-aduan">Riwayat Aduan</a>
						<hr>
						<a href="<?= BASEURL ?>/logout">Logout</a>
					</div>
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

<script type="text/javascript">
	function showmenu(){
		document.querySelector('#menu-account').classList.toggle('hide');
	}
</script>