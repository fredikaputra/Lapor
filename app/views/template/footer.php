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
	
	<?php
	
	foreach ($data['js'] as $js) {
		?><script src="<?= BASEURL ?>/assets/js/<?= $js ?>"></script><?php
	}
	
	?>
</body>
</html>