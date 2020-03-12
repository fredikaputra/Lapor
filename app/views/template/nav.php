<nav>
	<div>
		<a class="logo" href="<?= BASEURL ?>">LAPOR!</a>
		<div>
			<?php
			
			if (isset($_SESSION['masyarakatNIK']) || isset($_SESSION['petugasID'])) {
				?><a class="bg-primary" href="<?= BASEURL ?>/logout">Logout</a><?php
			}else {
				?>
				
				<div>
					<button type="button" class="bg-primary" onclick="showmodallogin()">Masuk</button>
					<button type="button" onclick="showmodalsignup()">Daftar</button>
				</div>
				
				<?php
			}
			
			?>
		</div>
	</div>
</nav>