	<div class="content">
		<div class="header">
			<h1>Tambah Petugas</h1>
		</div>
		
		<form action="<?= BASEURL ?>/dashboard/proccess-tambah-pengguna/petugas" method="post" enctype="multipart/form-data">
			<div>
				<img src="<?= BASEURL ?>/assets/img/icon/petugas.png">
			</div>
			<div>
				<div>
					<label for="name">Nama</label>
					<input type="text" id="name" placeholder="Nama Lengkap" name="name" value="<?= (isset($_SESSION['reg'])) ? $_SESSION['reg']['name'] : '' ?>" required>
				</div>
				<div>
					<label for="username">Username</label>
					<input type="text" id="username" placeholder="Username Baru" name="username" value="<?= (isset($_SESSION['reg'])) ? $_SESSION['reg']['username'] : '' ?>" required <?= (isset($_SESSION['autofocus']['username'])) ? 'autofocus' : '' ?>>
				</div>
				<div>
					<label for="password">Password</label>
					<input type="password" id="password" placeholder="Password minimal 8 karakter" name="password" <?= (isset($_SESSION['autofocus']['pass'])) ? 'autofocus' : '' ?> required>
				</div>
				<div>
					<label for="repass">Konfirmasi Password</label>
					<input type="password" id="repass" placeholder="Masukkan ulang password anda" name="repass" required>
				</div>
				<div>
					<label for="phone">Nomor Telepon</label>
					<input type="number" id="phone" placeholder="Nomor Telpon" name="phone" onkeypress="if (this.value.length == 15) return false;" value="<?= (isset($_SESSION['reg'])) ? $_SESSION['reg']['phone'] : '' ?>" <?= (isset($_SESSION['autofocus']['pass'])) ? 'autofocus' : '' ?> required>
				</div>
				<div>
					<label for="image">Gambar</label>
					<label>Foto Profil
						<input type="file" id="image" name="photo" accept=".jpg, .jpeg">
					</label>
				</div>
				<div>
					<button type="submit" name="addpetugas" onclick="unsetload()">BERGABUNG!</button>
				</div>
			</div>
		</form>
	</div>
</main>

<?php

if (isset($_SESSION['reg'])) {
	unset($_SESSION['reg']);
}

if (isset($_SESSION['autofocus'])) {
	unset($_SESSION['autofocus']);
}

?>