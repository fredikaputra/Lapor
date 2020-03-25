<main>
	<form>
		<a href="<?= BASEURL ?>" title="Beranda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-home-page.png">
		</a>
		<h1>Login</h1>
		<span>Hallo, silahkan untuk masukkan username dan password anda!</span>
		<div title="Masukkan username anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-user.png"><input type="text" placeholder="Username" autofocus>
		</div>
		<div title="Masukkan password anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-padlock.png"><input type="password" placeholder="Password">
		</div>
		<button type="submit">LOGIN</button>
		<span>Belum punya akun? <a href="<?= BASEURL ?>/daftar">Daftar</a> sekarang!</span>
	</form>
</main>