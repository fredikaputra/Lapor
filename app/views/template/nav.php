<nav>
	<div>
		<a class="logo" href="<?= BASEURL ?>">LAPOR!</a>
		<div>
			<?php
			
			if (isset($_SESSION['masyarakatNIK']) || isset($_SESSION['petugasID'])) {
				?>
					<div class="logged">
						<button type="button" onclick="showmenu()">
							<img src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
							<?= $data['name'] ?>
							<img src="<?= BASEURL ?>/assets/img/icon/down-arrow.png" alt="">
						</button>
						<div class="accountMenu hide">
							<a href="<?= BASEURL ?>/fredikaputra/pengaturan">
								<img src="<?= BASEURL ?>/assets/img/icon/gear.png" alt="">
							</a>
							<div>
								<img src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
								<div></div>
								<!-- <a href=""> -->
									<img src="<?= BASEURL ?>/assets/img/icon/camera.png" alt="">
								<!-- </a> -->
							</div>
							<span><?= $data['name'] ?></span>
							<span>@<?= $data['username'] ?></span>
							<a href="<?= BASEURL ?>/fredikaputra">Dashboard</a>
							<hr>
							<a href="<?= BASEURL ?>/logout">Logout</a>
						</div>
					</div>
				<?php
			}else {
				?>
				
				<div class="unlog">
					<button type="button" class="bg-primary" onclick="showmodallogin()">Masuk</button>
					<button type="button" onclick="showmodalsignup()">Daftar</button>
				</div>
				
				<?php
			}
			
			?>
		</div>
	</div>
</nav>

<script type="text/javascript">
	function showmenu(){
		document.querySelector('.accountMenu').classList.toggle('hide');
	}
</script>