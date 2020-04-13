<header>
	<h1>Pengaturan</h1>
</header>
<main>
	<h2>Informasi Pribadi</h2>
	<span>Informasi dasar anda seperti nama dan foto.</span>
	<div>
		<a href="<?= BASEURL ?>/profil">
			<img src="<?= BASEURL ?>/assets/img/icon/left-arrow.png" alt="">
		</a>
		<h3>Nama</h3>
		
		<form action="<?= BASEURL ?>/profil/sunting/nama/proses" method="post">
			<input type="text" id="input" value="<?= $data['name'] ?>" onkeyup="checkValueChange()" name="name"><button type="submit" name="update" id="save" style="color: lightgray;" disabled>Simpan</button>
		</form>
	</div>
</main>