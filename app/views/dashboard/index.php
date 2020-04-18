	<div class="content">
		<div>
			<img src="<?= BASEURL ?>/assets/img/users/default.png" alt="">
			<span>Selamat Datang, <strong><?= $data['petugas']['nama_petugas'] ?></strong></span>
			<img src="<?= BASEURL ?>/assets/img/icon/computer.png">
		</div>
		<div>
			<div class="count-data">
				<div>
					<div>
						<img src="<?= BASEURL ?>/assets/img/icon/circle-uniq-user.png">
						<div>
							<strong><?= $data['tableRow']['admin'] ?></strong>
							<span>Admin</span>
						</div>
					</div>
					<div>
						<img src="<?= BASEURL ?>/assets/img/icon/circle-user-name.png">
						<div>
							<strong><?= $data['tableRow']['petugas'] ?></strong>
							<span>Petugas</span>
						</div>
					</div>
					<div>
						<img src="<?= BASEURL ?>/assets/img/icon/circle-user.png">
						<div>
							<strong><?= $data['tableRow']['masyarakat'] ?></strong>
							<span>Masyarakat</span>
						</div>
					</div>
					<div>
						<img src="<?= BASEURL ?>/assets/img/icon/paper.png">
						<div>
							<strong><?= $data['tableRow']['laporan'] ?></strong>
							<span>Laporan Masuk</span>
						</div>
					</div>
					<div>
						<img src="<?= BASEURL ?>/assets/img/icon/information-desk.png">
						<div>
							<strong><?= $data['tableRow']['proses'] ?></strong>
							<span>Laporan Dalam Proses</span>
						</div>
					</div>
					<div>
						<img src="<?= BASEURL ?>/assets/img/icon/tick.png">
						<div>
							<strong><?= $data['tableRow']['selesai'] ?></strong>
							<span>Kasus Laporan Selesai</span>
						</div>
					</div>
				</div>
			</div>
			
			<div class="data">
				<div>
					<h2>Data Aduan Terbaru</h2>
					<?php
					
					if ($data['laporan'] != NULL) {
						?><span><?= count($data['laporan']) ?> data aduan terbaru yang masuk dari masyarakat</span><?php
						foreach ($data['laporan'] as $laporan) {
							?>
							
							<div>
								<a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan['id_pengaduan'] ?>">
									<div>
										<?= $laporan['nama'] ?>
									</div>
									<div>
										<p><?= $laporan['isi_laporan'] ?></p>
									</div>
									<div>
										<?= Data_model::timeCounter($laporan['tgl_pengaduan']) ?>
									</div>
								</a>
								<?php
								
								if ($data['petugas']['level'] == 1) {
									?>
									
									<div class="action">
										<a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan['id_pengaduan'] ?>">
											<img src="<?= BASEURL ?>/assets/img/icon/eye.png">
										</a>
										<a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan['id_pengaduan'] ?>?cetak=1">
											<img src="<?= BASEURL ?>/assets/img/icon/print.png">
										</a>
										<button type="button" data-id="<?= $laporan['id_pengaduan'] ?>" onclick="delPopup(this)">
											<img src="<?= BASEURL ?>/assets/img/icon/bin.png">
										</button>
									</div>
									
									<?php
								}
								
								?>
							</div>
							
							<?php
						}
					}else {
						?>
						
						<span><?= count($data['laporan']) ?> data aduan terbaru yang masuk dari masyarakat</span>
						<div style="padding: 1cm; letter-spacing: 1px; font-weight: bold; text-align: center">Tidak ada data!</div>
						
						<?php
					}
					
					?>
				</div>
			</div>
		</div>
	</div>
</main>

<script type="text/javascript">
	function delPopup(i){
		document.querySelector('.popup').classList.remove('hide');
		var id = i.getAttribute('data-id');
		document.querySelector('#deleteForm').setAttribute('action', '<?= BASEURL ?>/dashboard/data-aduan/hapus/' + id + '/beranda');
		document.querySelector('#info').innerHTML = 'Apakah anda yakin ingin menghapus laporan';
		document.querySelector('#id').innerHTML = '#' + id;
	}

	function closeDelPopup(){
		document.querySelector('.popup').classList.add('hide');
	}
</script>