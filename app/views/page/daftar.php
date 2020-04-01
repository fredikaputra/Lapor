<main>
	<form method="post" action="<?= BASEURL ?>/daftar/proccess">
		<a href="<?= BASEURL ?>" title="Beranda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-home-page.png">
		</a>
		<h1>Daftar</h1>
		<span>Hallo, silahkan untuk masukkan data - data anda sebagai berikut!</span>
		<div <?= (isset($_SESSION['autofocus']['nik'])) ? 'class="false"' : '' ?> title="Masukkan Nomor Induk Kependudukan anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-id.png">
			<input type="number" name="nik" value="<?= (isset($_SESSION['reg'])) ? $_SESSION['reg']['nik'] : '' ?>" onkeypress="if (this.value.length == 16) return false;" placeholder="Nomor Induk Kependudukan" min="0" required <?= (isset($_SESSION['autofocus']['nik']) || !isset($_SESSION['autofocus'])) ? 'autofocus' : '' ?>>
		</div>
		<div title="Masukkan nama lengkap anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-user-name.png">
			<input type="text" name="name" value="<?= (isset($_SESSION['reg'])) ? $_SESSION['reg']['name'] : '' ?>" placeholder="Nama Lengkap" required>
		</div>
		<div <?= (isset($_SESSION['autofocus']['username'])) ? 'class="false"' : '' ?> title="Buat username baru anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-uniq-user.png">
			<input type="text" name="username" value="<?= (isset($_SESSION['reg'])) ? $_SESSION['reg']['username'] : '' ?>" placeholder="Username Baru" required <?= (isset($_SESSION['autofocus']['username'])) ? 'autofocus' : '' ?>>
		</div>
		<div <?= (isset($_SESSION['autofocus']['pass'])) ? 'class="false"' : '' ?> title="Buat password baru anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-padlock.png">
			<input type="password" name="pass" placeholder="Password Baru" required <?= (isset($_SESSION['autofocus']['pass'])) ? 'autofocus' : '' ?>>
		</div>
		<div title="Masukkan password yang telah anda buat">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-padlock.png"><input type="password" name="repass" placeholder="Konfirmasi Password Anda" required>
		</div>
		<div title="Masukkan nomor telepon anda">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-phone-book.png"><input type="number" name="phone" value="<?= (isset($_SESSION['reg'])) ? $_SESSION['reg']['phone'] : '' ?>" onkeypress="if (this.value.length == 15) return false;" min="0" placeholder="Nomor Telepon" required>
		</div>
		<button type="submit" name="reg" onclick="unsetload()">DAFTAR</button>
		<span>Sudah punya akun? <a href="<?= BASEURL ?>/login">Login</a> sekarang!</span>
	</form>
</main>

<script type="text/javascript">	
	function unsetload(){
		window.onbeforeunload = null;
	}
</script>

<?php

if (isset($_SESSION['reg'])) {
	unset($_SESSION['reg']);
}

if (isset($_SESSION['autofocus'])) {
	unset($_SESSION['autofocus']);
}

?>