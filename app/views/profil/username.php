<header>
	<h1>Profil</h1>
</header>
<main>
	<h2>Informasi Pribadi</h2>
	<span>Informasi dasar anda seperti nama dan foto.</span>
	<div class="singleRow">
		<a href="<?= BASEURL ?>/profil">
			<img src="<?= BASEURL ?>/assets/img/icon/left-arrow.png" alt="">
		</a>
		<h3>Username</h3>
		
		<form action="<?= BASEURL ?>/profil/sunting/username/proses" method="post">
			<input type="text" id="input" value="<?= $data['username'] ?>" onkeyup="checkValueChange()" name="username" required>
			<button type="submit" name="update" id="save" style="color: lightgray;" disabled>Simpan</button>
		</form>
	</div>
</main>