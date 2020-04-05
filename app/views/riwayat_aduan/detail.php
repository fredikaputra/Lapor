<header>
	<h1>Data</h1>
</header>
<main>
	<h2>Riwayat Aduan</h2>
	<span>Detail data aduan</span>
	<div class="report">
		<div>
			<div class="header">
				<span><?= $data['laporan']['id_pengaduan'] ?></span>
				<span><?= strftime("%A, %d %B %Y", $data['laporan']['tgl_pengaduan']) ?></span>
			</div>
			<p><?= $data['laporan']['isi_laporan'] ?></p>
			<?php
			
			if ($data['laporan']['foto'] != NULL) {
				?><img src="<?= BASEURL ?>/assets/img/pengaduan/<?= $data['laporan']['foto'] ?>?=<?= filemtime('assets/img/pengaduan/' . $data['laporan']['foto']) ?>"><?php
			}
			
			?>
			<span>Status: <strong><?= ($data['laporan']['status'] == 1) ? 'Selesai' : 'Dalam Proses' ?></strong></span>
		</div>
		<div class="comment">
			<div>
				<h3>Komentar</h3>
				<?php
				
				if ($data['tanggapan'] != NULL) {
					?>
					
					
					<?php
					
					foreach ($data['tanggapan'] as $tanggapan) {
						?>
						
						<div>
							<div class="header">
								<strong><?= $tanggapan['nama_petugas'] ?> | <?= ($tanggapan['level'] == 1) ? 'Admin' : 'Petugas' ?></strong>
								<span><?= Data_model::timeCounter($tanggapan['tgl_tanggapan']) ?></span>
							</div>
							<p><?= $tanggapan['tanggapan'] ?></p>
						</div>
						
						<?php
					}
				}else {
					?>
					
					<div>
						<span><strong>Belum ditanggapi!</strong></span>
					</div>
					
					<?php
				}
				
				?>
			</div>
		</div>
	</div>
</main>