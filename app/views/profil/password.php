<header>
	<h1>Profil</h1>
</header>
<main>
	<h2>Informasi Pribadi</h2>
	<span>Informasi dasar anda seperti nama dan foto.</span>
	<div class="password">
		<a href="<?= BASEURL ?>/profil">
			<img src="<?= BASEURL ?>/assets/img/icon/left-arrow.png" alt="">
		</a>
		
		<form action="<?= BASEURL ?>/profil/sunting/password/proses" method="post">
			<h3>Password Sekarang</h3>
			<input type="password" id="input" placeholder="Kata sandi saat ini" onkeyup="checkValueChange()" name="curentPass" required>
			
			<h3>Password Baru</h3>
			<input type="password" id="input" placeholder="Buat kata sandi baru" onkeyup="checkValueChange()" name="newPass" required>
			<input type="password" id="input" placeholder="Konfirmasi kata sandi baru" onkeyup="checkValueChange()" name="confirmPass" required>
			
			<button type="submit" name="update" id="save">UBAH PASSWORD</button>
		</form>
	</div>
</main>