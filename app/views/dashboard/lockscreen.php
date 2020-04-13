<main>
	<form action="<?= BASEURL ?>/login/proses" method="post">
		<h1>Terkunci!</h1>
		<span>Hallo <?= $_SESSION['onLock']['name'] ?>, masukkan password untuk kembali ke dashboard!</span>
		
		<?php
		
		if (file_exists('assets/img/users/' . $_SESSION['onLock']['photo'])) {
			?><img src="<?= BASEURL ?>/assets/img/users/<?= $_SESSION['onLock']['photo'] ?>?=<?= filemtime('assets/img/users/' . $_SESSION['onLock']['photo']) ?>"><?php
		}else {
			?><img src="<?= BASEURL ?>/assets/img/users/default.png"><?php
		}
		
		?>
		
		<span><?= $_SESSION['onLock']['name'] ?></span>
		<div>
			<input type="password" placeholder="Password" name="password" required autofocus><img src="<?= BASEURL ?>/assets/img/icon/circle-padlock.png">
		</div>
		
		<button type="submit" name="login">BUKA KUNCI</button>
		
		<span>Bukan anda? Silahkan <a href="<?= BASEURL ?>/login">login disini!</a></span>
	</form>
</main>