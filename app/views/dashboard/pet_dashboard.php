	<div class="content">
		<div>
			<img src="<?= BASEURL ?>/assets/img/users/default.png" alt="">
			<span>Selamat Datang, <strong><?= $data['name'] ?></strong></span>
			<img src="<?= BASEURL ?>/assets/img/icon/computer.png">
		</div>
		<div>
			<div>
				<form method="post" action="<?= BASEURL ?>/dashboard/update-profile" enctype="multipart/form-data">
					<h2>Pengaturan Profil</h2>
					<div>
						<?php
						
						if (file_exists('assets/img/users/' . $data['photo'])) {
							?><img src="<?= BASEURL ?>/assets/img/users/<?= $data['photo'] ?>" alt=""><?php
						}else {
							?><img src="<?= BASEURL ?>/assets/img/users/default.png" alt=""><?php
						}
						
						?>
						<label><img src="<?= BASEURL ?>/assets/img/icon/camera.png" alt="">
							<input type="file" name="photo">
						</label>
					</div>
					<div>
						<img src="<?= BASEURL ?>/assets/img/icon/circle-user.png" alt="">
						<input type="text" value="<?= $data['name'] ?>" name="name">
					</div>
					<div>
						<img src="<?= BASEURL ?>/assets/img/icon/circle-phone-book.png" alt="">
						<input type="number" value="<?= $data['phone'] ?>" name="phone">
					</div>
					<div>
						<a href="<?= BASEURL ?>/dashboard/change-pass">Ganti Password</a>
						<div>
							<button type="reset">Batal</button>
							<button type="submit" name="updateprofile">Simpan</button>
						</div>
					</div>
				</form>
			</div>
			
			<div>
				<div>
					<table>
						<caption>Aduan Laporan Terbaru</caption>
						<thead>
							<tr>
								<td>#ID</td>
								<td>Waktu</td>
								<td>Dari</td>
								<td>Laporan</td>
								<td>Status</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>LPRDID64J87</td>
								<td>3 Menit yang lalu</td>
								<td>Lada Sattar</td>
								<td>
									<p>Tolong pindahkan kabel listrik yang ada di atas rumah saya, karena itu sanggat mengganggu!</p>
								</td>
								<td>Dalam Proses</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>