<header>
	<h1>Pengaturan</h1>
</header>
<main>
	<h2>Informasi Pribadi</h2>
	<span>Informasi dasar anda seperti nama dan foto.</span>
	<div>
		<a href="<?= BASEURL ?>/pengaturan">
			<img src="<?= BASEURL ?>/assets/img/icon/left-arrow.png" alt="">
		</a>
		<h3>Foto Profil</h3>
		
		<?php
		
		if (file_exists('assets/img/users/' . $data['photo'])) {
			?><img src="<?= BASEURL ?>/assets/img/users/<?= $data['photo'] ?>" alt=""><?php
		}else {
			?><img src="<?= BASEURL ?>/assets/img/users/default.png" alt=""><?php
		}
		
		?>
		<form action="<?= BASEURL ?>/pengaturan/proccess/photo" method="post" enctype="multipart/form-data">
			<label>Upload Gambar
				<input type="file" name="photo">
			</label>
			<!-- <button type="submit" name="update" id="save" style="color: lightgray;" disabled>Simpan</button> -->
			<button type="submit" name="update" id="save">Simpan</button>
		</form>
	</div>
</main>

<script type="text/javascript">

</script>