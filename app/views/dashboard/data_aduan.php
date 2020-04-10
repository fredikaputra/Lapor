	<div class="content">
		<div class="header">
			<h2>Data Aduan</h2>
			<span>Semua data aduan yang masuk dari masyarakat</span>
		</div>
		<div>
			<form action="<?= BASEURL ?>/dashboard/data-aduan/filter" method="POST" class="filter">
				<div>
					<div class="header">
						<span>Filter Laporan</span>
					</div>
					<div class="filter-menu">
						<div>
							<span>TERLAMPIR</span>
							<select name="img">
								<option value="all">Tanpa Filter</option>
								<option value="w/img">Dengan Gambar</option>
								<option value="wo/img">Tanpa Gambar</option>
							</select>
						</div>
						<div>
							<span>STATUS</span>
							<select name="status">
								<option value="all">Tanpa Filter</option>
								<option value="0">Dalam Proses</option>
								<option value="1">Selesai</option>
							</select>
						</div>
						<div>
							<span>SORTIR</span>
							<select name="sort">
								<option value="dateDESC">Terbaru</option>
								<option value="dateASC">Terlama</option>
								<option value="nameASC">Nama Pelapor (A - Z)</option>
								<option value="nameDESC">Nama Pelapor (Z - A)</option>
							</select>
						</div>
						<div>
							<span>TAMPIL</span>
							<select name="show">
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="50">50</option>
								<option value="100">100</option>
								<option value="all">Semua</option>
							</select>
						</div>
					</div>
					<div class="footer">
						<a href="<?= BASEURL ?>/dashboard/data-aduan">Atur Ulang</a>
						<button type="submit" name="filter">Filter</button>
					</div>
				</div>
			</form>
			<div class="data">
				<form>
					<span>Menampilkan 10 dari 10 pengguna</span>
					<div>
						<input type="text" name="" placeholder="Cari nama pelapor atau topik isi laporan...">
						<button type="submit" name="search">
							<img src="<?= BASEURL ?>/assets/img/icon/search.png">
						</button>
					</div>
				</form>
				<section class="header">
					<div>
						<span>#</span>
					</div>
					<div>
						<span>Dari</span>
					</div>
					<div>
						<span>Isi Laporan</span>
					</div>
					<div>
						<span>Waktu</span>
					</div>
				</section>
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