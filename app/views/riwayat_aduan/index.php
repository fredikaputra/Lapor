<header>
	<h1>Data</h1>
</header>
<main>
	<h2>Riwayat Aduan</h2>
	<span>Semua data aduan anda</span>
	<div class="data">
		<?php
		
		if ($data['laporan'] == !NULL) {
			$no = 1;
			foreach ($data['laporan'] as $laporan) {
				?>
				
				<div>
					<a href="<?= BASEURL ?>/riwayat-aduan/detail/<?= $laporan['id_pengaduan'] ?>">
						<div>
							<span><?= $no ?></span>
						</div>
						<div>
							<p><?= $laporan['isi_laporan'] ?></p>
						</div>
						<div>
							<?= strftime("%A, %d %B %Y", $laporan['tgl_pengaduan']) ?>
						</div>
						<div>
							<?php
							
							if ($laporan['status'] == 0) {
								echo 'Dalam Proses';
							}else {
								echo 'Selesai';
							}
							
							?>
						</div>
					</a>
				</div>
				
				<?php
				$no++;
			}
		}
		
		?>
	</div>
</main>