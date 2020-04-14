<header>
	<h1>Data</h1>
</header>
<main>
	<h2>Riwayat Aduan</h2>
	<span>Semua data aduan anda</span>
	<div>
		<form action="<?= BASEURL ?>/dashboard/data-aduan" method="GET" class="filter">
			<div>
				<div class="header">
					<span>Filter Laporan</span>
				</div>
				<div class="filter-menu">
					<div>
						<span>TERLAMPIR</span>
						<select name="gambar">
							<option value="0">Tanpa Filter</option>
							<option value="2">Dengan Gambar</option>
							<option value="1">Tanpa Gambar</option>
						</select>
					</div>
					<div>
						<span>STATUS</span>
						<select name="status">
							<option value="semua">Semua Status</option>
							<option value="0">Dalam Proses</option>
							<option value="1">Selesai</option>
						</select>
					</div>
					<div>
						<span>SORTIR</span>
						<select name="urutan">
							<option value="1">Terbaru</option>
							<option value="2">Terlama</option>
							<option value="3">Nama Pelapor (A - Z)</option>
							<option value="4">Nama Pelapor (Z - A)</option>
						</select>
					</div>
					<div>
						<span>TAMPIL</span>
						<select name="tampil">
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
							<option value="semua">Semua</option>
						</select>
					</div>
				</div>
				<div class="footer">
					<a href="">Atur Ulang</a>
					<button type="button" name="filter" value="on">Filter</button>
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
							<a href="<?= BASEURL ?>/riwayat-aduan/detail/<?= $laporan['id_pengaduan'] ?>">
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