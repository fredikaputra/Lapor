	<div class="content">
		<div class="header">
			<h2>Data Aduan</h2>
			<span>Semua data aduan yang masuk dari masyarakat</span>
		</div>
		<div>
			<div class="filter">
				<div>
					<div class="header">
						<span>Filter Laporan</span>
					</div>
					<div class="filter-menu">
						<div>
							<span>TERLAMPIR</span>
							<select name="">
								<option value="">Tanpa Filter</option>
								<option value="">Dengan Gambar</option>
								<option value="">Tanpa Gambar</option>
							</select>
						</div>
						<div>
							<span>STATUS</span>
							<select name="">
								<option value="">Tanpa Filter</option>
								<option value="">Dalam Proses</option>
								<option value="">Selesai</option>
							</select>
						</div>
						<div>
							<span>SORTIR</span>
							<select name="">
								<option value="">Terbaru</option>
								<option value="">Terlama</option>
								<option value="">Nama Pelapor (A - Z)</option>
								<option value="">Nama Pelapor (Z - A)</option>
							</select>
						</div>
						<div>
							<span>TAMPIL</span>
							<select name="">
								<option value="">10</option>
								<option value="">20</option>
								<option value="">50</option>
								<option value="">100</option>
								<option value="">Semua</option>
							</select>
						</div>
					</div>
					<div class="footer">
						<a href="<?= BASEURL ?>/dashboard/pengguna">Atur Ulang</a>
						<button type="submit" name="filter">Filter</button>
					</div>
				</div>
			</div>
			<div class="data">
				<div>
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
	</div>
</main>