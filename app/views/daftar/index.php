<main>
	<form action="<?= BASEURL ?>/daftar/proccess" method="post">
		<a href="<?= BASEURL ?>">
			<img src="<?= BASEURL ?>/assets/img/icon/circle-home-page.png" alt="">
		</a>
		<h1>Daftar</h1>
		<span>Hallo, silahkan untuk memasukkan data - data anda sebagai berikut!</span>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-id.png" alt=""><input type="number" name="nik" min="0" placeholder="Nomor Induk Kependudukan" oninvalid="this.setCustomValidity('Masukkan Nomor Induk Kependudukan anda!')" oninput="setCustomValidity('')" value="<?= (isset($data['register']['nik'])) ? $data['register']['nik'] : '' ?>" title="Nomor Induk Kependudukan" required autofocus>
		</div>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-user-name.png" alt=""><input type="text" name="name" placeholder="Nama Lengkap" oninvalid="setCustomValidity('Masukkan nama lengkap anda!')" oninput="setCustomValidity('')" value="<?= (isset($data['register']['name'])) ? $data['register']['name'] : '' ?>" title="Nama Lengkap" required>
		</div>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-uniq-user.png" alt=""><input type="text" name="username" placeholder="Username Baru" oninvalid="this.setCustomValidity('Buat username baru anda!')" oninput="setCustomValidity('')" value="<?= (isset($data['register']['username'])) ? $data['register']['username'] : '' ?>" title="Username" required>
		</div>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-padlock.png" alt=""><input type="password" name="password" placeholder="Password Baru" oninvalid="setCustomValidity('Password minimal 8 karakter!')" oninput="setCustomValidity('')" value="<?= (isset($data['register']['password'])) ? $data['register']['password'] : '' ?>" title="Password" required>
		</div>
		<small>Password minimal 8 karakter!</small>
		<div>
			<img src="<?= BASEURL ?>/assets/img/icon/circle-phone-book.png" alt=""><input type="number" min="0" name="phone" placeholder="Nomor Telepon" oninvalid="setCustomValidity('Masukkan nomor telepon anda!')" oninput="setCustomValidity('')" value="<?= (isset($data['register']['phone'])) ? $data['register']['phone'] : '' ?>" title="Nomor Telepon" required>
		</div>
		<button type="submit" name="register">DAFTAR</button>
		<span>Sudah punya akun? <a href="<?= BASEURL ?>/login">Login</a> sekarang!</span>
	</form>
</main>