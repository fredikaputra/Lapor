	<div class="content">
		<div class="header">
			<div>
				<h1>Pengaturan</h1>
				<span>Ubah pengaturan profil anda.</span>
			</div>
		</div>
		
		<form method="post" action="<?= BASEURL ?>/dashboard/pengaturan/proses" enctype="multipart/form-data">
			<div class="top">
				<?php
				
				if (file_exists('assets/img/users/' . $data['photo'])) {
					?><img src="<?= BASEURL ?>/assets/img/users/<?= $data['photo'] ?>?=<?= filemtime('assets/img/users/' . $data['photo']) ?>"><?php
				}else {
					?><img src="<?= BASEURL ?>/assets/img/users/default.png"><?php
				}
				
				?>
				<label>Upload Gambar
					<input type="file" name="photo">
				</label>
			</div>
			<div class="body">
				<div>
					<label for="name">Nama</label>
					<input type="text" name="name" id="name" class="inputchange" placeholder="Nama Lengkap" value="<?= $data['petugas']['nama_petugas'] ?>">
				</div>
				<div>
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="inputchange" placeholder="Username"  value="<?= $data['petugas']['username'] ?>" >
				</div>
				<div>
					<label for="phone">Nomor Telepon</label>
					<input type="text" name="phone" id="phone" class="inputchange" placeholder="Nomor Telepon"  value="<?= $data['petugas']['telp'] ?>" >
				</div>
			</div>
			<div class="changepass">
				<span>Ingin Mengubah Password Anda?</span>
				<a href="<?= BASEURL ?>/dashboard/pengaturan/ganti-password">Ganti Password</a>
			</div>
			<div class="footer">
				<button type="submit" name="updateprofile" onclick="checkValueChange()">Simpan</button>
			</div>
		</form>
	</div>
</main>
<script type="text/javascript">
function checkValueChange(){
	var input_form = document.querySelectorAll('.inputchange');
	
	for (var i = 0; i < input_form.length; i++) {
		if (input_form[i].defaultValue == input_form[i].value) {
			input_form[i].setAttribute('disabled', '');
		}
	}
}
</script>