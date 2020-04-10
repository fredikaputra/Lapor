	<div class="content">
		<div class="header">
			<div>
				<h1>Pengaturan</h1>
				<span>Ubah pengaturan profil anda.</span>
			</div>
		</div>
		
		<form method="post" action="<?= BASEURL ?>/dashboard/pengaturan/proccess" enctype="multipart/form-data">
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
				<a href="<?= BASEURL ?>/dashboard/pengaturan/hapus-foto-profil">Hapus Gambar</a>
			</div>
			<div class="body">
				<div>
					<label for="name">Nama</label>
					<input type="text" name="name" id="name" placeholder="Nama Lengkap" value="<?= $data['petugas']['nama_petugas'] ?>">
				</div>
				<div>
					<label for="username">Username</label>
					<input type="text" name="username" id="username" placeholder="Username"  value="<?= $data['petugas']['username'] ?>">
				</div>
				<div>
					<label for="phone">Nomor Telepon</label>
					<input type="text" name="phone" id="phone" placeholder="Nomor Telepon"  value="<?= $data['petugas']['telp'] ?>">
				</div>
			</div>
			<div class="changepass">
				<span>Ingin Mengubah Password Anda?</span>
				<a href="">Ganti Password</a>
			</div>
			<div class="footer">
				<button type="submit" name="updateprofile">Simpan</button>
			</div>
		</form>
	</div>
</main>