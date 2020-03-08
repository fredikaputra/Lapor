	<footer>
		<a class="logo" href="<?= BASEURL ?>">LAPOR!</a>
		<span>Kami membantu anda untuk menyalurkan aspirasi anda kepada instansi yang berwenang demi tercapainya kepuasan anda.</span>
		<div>
			<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-facebook.png" alt=""></a>
			<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-instagram.png" alt=""></a>
			<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-twitter.png" alt=""></a>
			<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-youtube.png" alt=""></a>
		</div>
	</footer>
	
	<div id="modal">
		<form class="login" method="post" action="<?= BASEURL ?>">
			<a href="javascript:void(0)"><img src="<?= BASEURL ?>/assets/img/icon/times.png" alt=""></a>
			<h2>Login</h2>
			<span>Masukkan username dan password anda untuk melanjutkan</span>
			<div>
				<img src="<?= BASEURL ?>/assets/img/icon/user.png" alt="">
				<input type="text" placeholder="Username" autofocus>
			</div>
			<div>
				<img src="<?= BASEURL ?>/assets/img/icon/lock.png" alt="">
				<input type="password" placeholder="Password">
			</div>
			<button type="submit" class="bg-flat bg-primary" name="login">Login</button>
			<a href="<?= BASEURL ?>">Belum Punya Akun?</a>
		</form>
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