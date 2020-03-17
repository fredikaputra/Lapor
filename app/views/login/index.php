<main>
	<form action="<?= BASEURL ?>/login/proccess" method="post">
		<a href="<?= BASEURL ?>">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-home-page.png" alt="">
		</a>
		<h1>Login</h1>
		<span>Hallo, silahkan untuk masukkan username dan password anda!</span>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-user.png" alt=""><input type="text" name="username" placeholder="Username" value="<?= (isset($_SESSION['login'])) ? $_SESSION['login']['username'] : '' ?>" required autofocus>
		</div>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-padlock.png" alt=""><input type="password" name="password" placeholder="Password" required>
		</div>
		<button type="submit" name="login">LOGIN</button>
		<span>Belum punya akun? <a href="<?= BASEURL ?>/daftar">Daftar</a> sekarang!</span>
	</form>
</main>