<main>
	<form action="index.html" method="post">
		<a href="<?= BASEURL ?>">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-home-page.png" alt="">
		</a>
		<h1>Daftar</h1>
		<span>Hallo, silahkan untuk memasukkan data - data anda sebagai berikut!</span>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-id.png" alt=""><input type="number" name="nik" min="0" placeholder="Nomor Induk Kependudukan" required>
		</div>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-user-name.png" alt=""><input type="text" name="name" placeholder="Nama Lengkap" required>
		</div>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-uniq-user.png" alt=""><input type="text" name="username" placeholder="Username Baru" required>
		</div>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-padlock.png" alt=""><input type="password" name="password" placeholder="Password Baru" required>
		</div>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-phone-book.png" alt=""><input type="number" min="0" name="password" placeholder="Nomor Telepon" required>
		</div>
		<button type="submit" name="login">SELANJUTNYA</button>
		<span>Sudah punya akun? <a href="<?= BASEURL ?>/login">Login</a> sekarang!</span>
	</form>
</main>