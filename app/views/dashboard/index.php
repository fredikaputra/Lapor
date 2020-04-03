	<div class="content">
		<div>
			<img src="<?= BASEURL ?>/assets/img/users/default.png" alt="">
			<span>Selamat Datang, <strong><?= $data['petugas']['nama_petugas'] ?></strong></span>
			<img src="<?= BASEURL ?>/assets/img/icon/computer.png">
		</div>
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
						<input type="file" id="onChange3" onchange="checkValueChange()" name="photo" accept=".jpg">
					</label>
				</div>
				<div>
					<img src="<?= BASEURL ?>/assets/img/icon/circle-user.png" alt="">
					<input type="text" id="onChange1" onkeyup="checkValueChange()" value="<?= $data['petugas']['nama_petugas'] ?>" name="name" autocomplete="off">
				</div>
				<div>
					<img src="<?= BASEURL ?>/assets/img/icon/circle-phone-book.png" alt="">
					<input type="number" id="onChange2" onkeyup="checkValueChange()" value="<?= $data['petugas']['telp'] ?>" name="phone" autocomplete="off">
				</div>
				<div>
					<a href="<?= BASEURL ?>/dashboard/change-pass">Ganti Password</a>
					<div>
						<button type="reset" class="hide" onclick="hide()" id="cancelSaveUserProfile">Batal</button>
						<button type="submit" class="hide" name="updateprofile" id="saveUserProfile">Simpan</button>
					</div>
				</div>
			</form>
			
			<div>
				<table>
					<caption>Aduan Laporan Terbaru</caption>
					<thead>
						<tr>
							<td>Waktu</td>
							<td>Dari</td>
							<td>Laporan</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<?php
						
						foreach ($data['laporan'] as $laporan) {
							?>
							
							<tr>
								<td>
									<?= Data_model::timeCounter($laporan['tgl_pengaduan']); ?>
								</td>
								<td><?= $laporan['nama'] ?></td>
								<td>
									<p><?= $laporan['isi_laporan'] ?></p>
								</td>
								<td><?= ($laporan['status'] == 0) ? 'Dalam Proses' : 'Selesai' ?></td>
							</tr>
							
							<?php
						}
						
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>