	<div class="content">
		<div>
			<h2>Data Aduan</h2>
			<span>Semua data aduan yang masuk dari masyarakat</span>
			<div class="data">
				<?php
				
				if ($data['laporan'] == !NULL) {
					foreach ($data['laporan'] as $laporan) {
						?>
						
						<div>
							<div>
								<input type="checkbox">
							</div>
							<div>
								<span><?= $laporan['nama'] ?></span>
							</div>
							<div>
								<p><?= $laporan['isi_laporan'] ?></p>
							</div>
							<div>
								<?= strftime("%A, %d %B %Y", $data['laporan'][0]['tgl_pengaduan']) ?>
							</div>
							<div class="action">
								<a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan['id_pengaduan'] ?>">
									<img src="<?= BASEURL ?>/assets/img/icon/eye.png">
								</a>
								<a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan['id_pengaduan'] ?>">
									<img src="<?= BASEURL ?>/assets/img/icon/print.png">
								</a>
								<a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan['id_pengaduan'] ?>">
									<img src="<?= BASEURL ?>/assets/img/icon/bin.png">
								</a>
							</div>
						</div>
						
						<?php
					}
				}
				
				?>
			</div>
		</div>
	</div>
</main>

