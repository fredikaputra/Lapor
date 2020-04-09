	<div class="content">
		<div>
			<h2>Data Aduan</h2>
			<span>Semua data aduan yang masuk dari masyarakat</span>
			<div class="data">
				<?php
				
				if ($data['laporan'] == !NULL) {
					$no = 1;
					foreach ($data['laporan'] as $laporan) {
						?>
						
						<div>
							<a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan['id_pengaduan'] ?>">
								<div>
									<span><?= $no ?></span>
								</div>
								<div>
									<span><?= $laporan['nama'] ?></span>
								</div>
								<div>
									<p><?= $laporan['isi_laporan'] ?></p>
								</div>
								<div>
									<?= strftime("%A, %d %B %Y", $laporan['tgl_pengaduan']) ?>
								</div>
							</a>
							<div class="action">
								<a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan['id_pengaduan'] ?>">
									<img src="<?= BASEURL ?>/assets/img/icon/eye.png">
								</a>
								<a href="<?= BASEURL ?>/dashboard/data-aduan/cetak/<?= $laporan['id_pengaduan'] ?>">
									<img src="<?= BASEURL ?>/assets/img/icon/print.png">
								</a>
								<a href="<?= BASEURL ?>/dashboard/data-aduan/hapus/<?= $laporan['id_pengaduan'] ?>">
									<img src="<?= BASEURL ?>/assets/img/icon/bin.png">
								</a>
							</div>
						</div>
						
						<?php
						$no++;
					}
				}else{
					?>
					
					<div style="padding: 1cm; letter-spacing: 1px; font-weight: bold; text-align: center">Tidak ada data!</div>
					
					<?php
				}
				
				?>
			</div>
		</div>
	</div>
</main>