<?php

// cek query pada url (setelah tanda ?)
$url = parse_url($_SERVER['REQUEST_URI']);
if (isset($url['query'])) {
	$url = parse_url($_SERVER['REQUEST_URI'])['query'];
	$url = explode('&', $url);
	foreach($url as $key => $value) {
		if (strpos($value, '=') != FALSE) {
			$query = explode('=', $value);
			$get[$query[0]] = $query[1];
		}
	}
}

if (isset($get['querysearch']) && strpos($get['querysearch'], '+')) {
	$get['querysearch'] = str_replace('+', ' ', $get['querysearch']);
}

?>

	<div class="content">
		<div class="header">
			<h2>Data Aduan</h2>
			<span>Semua data aduan yang masuk dari masyarakat</span>
		</div>
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
								<option value="0" <?= (isset($get['gambar']) && $get['gambar'] == '0') ? 'selected' : '' ?>>Tanpa Filter</option>
								<option value="2" <?= (isset($get['gambar']) && $get['gambar'] == '2') ? 'selected' : '' ?>>Dengan Gambar</option>
								<option value="1" <?= (isset($get['gambar']) && $get['gambar'] == '1') ? 'selected' : '' ?>>Tanpa Gambar</option>
							</select>
						</div>
						<div>
							<span>STATUS</span>
							<select name="status">
								<option value="semua" <?= (isset($get['status']) && $get['status'] == 'semua') ? 'selected' : '' ?>>Semua Status</option>
								<option value="0" <?= (isset($get['status']) && $get['status'] == '0') ? 'selected' : '' ?>>Dalam Proses</option>
								<option value="1" <?= (isset($get['status']) && $get['status'] == '1') ? 'selected' : '' ?>>Selesai</option>
							</select>
						</div>
						<div>
							<span>SORTIR</span>
							<select name="urutan">
								<option value="1" <?= (isset($get['urutan']) && $get['urutan'] == '1') ? 'selected' : '' ?>>Terbaru</option>
								<option value="2" <?= (isset($get['urutan']) && $get['urutan'] == '2') ? 'selected' : '' ?>>Terlama</option>
								<option value="3" <?= (isset($get['urutan']) && $get['urutan'] == '3') ? 'selected' : '' ?>>Nama Pelapor (A - Z)</option>
								<option value="4" <?= (isset($get['urutan']) && $get['urutan'] == '4') ? 'selected' : '' ?>>Nama Pelapor (Z - A)</option>
							</select>
						</div>
						<div>
							<span>TAMPIL</span>
							<select name="tampil">
								<option value="10" <?= (isset($get['tampil']) && $get['tampil'] == '10') ? 'selected' : '' ?>>10</option>
								<option value="20" <?= (isset($get['tampil']) && $get['tampil'] == '20') ? 'selected' : '' ?>>20</option>
								<option value="50" <?= (isset($get['tampil']) && $get['tampil'] == '50') ? 'selected' : '' ?>>50</option>
								<option value="semua" <?= (isset($get['tampil']) && $get['tampil'] == 'semua') ? 'selected' : '' ?>>Semua</option>
							</select>
						</div>
					</div>
					<div class="footer">
						<a href="<?= BASEURL ?>/dashboard/data-aduan">Atur Ulang</a>
						<button type="submit" name="filter" value="on">Filter</button>
					</div>
				</div>
			</form>
			<div class="data">
				<form>
					<span>
					
						<?php
						
						if (isset($get['querysearch'])) {
							?>
							
							Menampilkan <?= ($data['laporan'] > 0) ? count($data['laporan']) : '0' ?> laporan untuk kata kunci <strong>"<?= $get['querysearch'] ?>"</strong>
							
							<?php
						}else if (isset($get['filter'])) {
							?>Menampilkan <?= ($data['laporan'] > 0) ? count($data['laporan']) : '0' ?> laporan berdasarkan filter.<?php
						}else {
							?>Menampilkan <?= ($data['laporan'] > 0) ? count($data['laporan']) : '0' ?> dari <?= $data['jml_laporan'] ?> laporan.<?php
						}
						
						?>
					
					</span>
					<div>
						<input type="text" name="querysearch" placeholder="Cari nama pelapor atau topik isi laporan..." <?= (isset($get['querysearch'])) ? 'value="' . $get['querysearch'] . '"' : '' ?> <?= (isset($get['search']) && $get['search'] == 'on') ? 'autofocus' : '' ?>>
						<button type="submit" name="search" value="on">
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

<script type="text/javascript">
	function delPopup(i){
		document.querySelector('.popup').classList.remove('hide');
		var id = i.getAttribute('data-id');
		document.querySelector('#deleteForm').setAttribute('action', '<?= BASEURL ?>/dashboard/data-aduan/hapus/' + id);
		document.querySelector('#info').innerHTML = 'Apakah anda yakin ingin menghapus laporan';
		document.querySelector('#id').innerHTML = '#' + id;
	}

	function closeDelPopup(){
		document.querySelector('.popup').classList.add('hide');
	}
</script>