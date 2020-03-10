<nav>
	<div>
		<a class="logo" href="<?= BASEURL ?>">LAPOR!</a>
		<div>
			<?php
			
			if (isset($_SESSION['masyarakatNIK']) || isset($_SESSION['petugasID'])) {
				?><a class="bg-rounded bg-primary" href="<?= BASEURL ?>/logout">Logout</a><?php
			}else {
				?>
				
				<div>
					<button type="button" class="bg-rounded bg-primary" onclick="showmodallogin()">Masuk</button>
					<button type="button" class="bg-rounded" onclick="showmodalsignup()">Daftar</button>
				</div>
				
				<?php
			}
			
			?>
		</div>
	</div>
</nav>