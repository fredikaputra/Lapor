<main>
	<form>
		<a href="<?= BASEURL ?>" title="Beranda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-home-page.png">
		</a>
		<h1>Daftar</h1>
		<span>Hallo, silahkan untuk masukkan data - data anda sebagai berikut!</span>
		<div title="Masukkan Nomor Induk Kependudukan anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-id.png"><input type="number" onkeypress="if (this.value.length == 16) return false;" placeholder="Nomor Induk Kependudukan" min="0" autofocus>
		</div>
		<div title="Masukkan nama lengkap anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-user-name.png"><input type="text" placeholder="Nama Lengkap">
		</div>
		<div title="Buat username baru anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-uniq-user.png"><input type="text" placeholder="Username Baru">
		</div>
		<!-- <small>Password minimal 8 karakter!</small> -->
		<div title="Buat password baru anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-padlock.png"><input type="password" placeholder="Password Baru">
		</div>
		<div title="Masukkan password yang telah anda buat">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-padlock.png"><input type="password" placeholder="Konfirmasi Password Anda">
		</div>
		<div title="Masukkan nomor telepon anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-phone-book.png"><input type="number" onkeypress="if (this.value.length == 15) return false;" min="0" placeholder="Nomor Telepon">
		</div>
		<button type="submit">DAFTAR</button>
		<span>Sudah punya akun? <a href="<?= BASEURL ?>/login">Login</a> sekarang!</span>
	</form>
</main>