	<div class="content">
		<h2>Tinjau Data Aduan</h2>
		<?php
		
		if ($data['petugas']['level'] == 1) {
			?>
			
			<div>
				<button onclick="cetak()">
					<img src="<?= BASEURL ?>/assets/img/icon/print.png"> CETAK
				</button>
				<button type="button" onclick="delPopup(this)" data-id="<?= $data['laporan']['id_pengaduan'] ?>">
					<img src="<?= BASEURL ?>/assets/img/icon/bin.png"> HAPUS
				</button>
			</div>
			
			<?php
		}
		
		?>
		<div>
			<div class="report">
				<div>
					<div class="header">
						<span><?= $data['laporan']['id_pengaduan'] ?></span>
						<span><?= strftime("%A, %d %B %Y %H:%M", $data['laporan']['tgl_pengaduan']) ?></span>
					</div>
					<span>Dari: <strong><?= $data['laporan']['nama'] ?></strong></span>
					<p><?= $data['laporan']['isi_laporan'] ?></p>
					<?php
					
					if ($data['laporan']['foto'] != NULL) {
						?><img src="<?= BASEURL ?>/assets/img/pengaduan/<?= $data['laporan']['foto'] ?>?=<?= filemtime('assets/img/pengaduan/' . $data['laporan']['foto']) ?>"><?php
					}
					
					?>
					<span>Status: <strong><?= ($data['laporan']['status'] == 1) ? 'Selesai' : 'Dalam Proses' ?></strong></span>
				</div>
			</div>
			<div class="action">
				<?php
				
				if ($data['petugas']['level'] == 2) {
					?>
					
					<form method="post" action="<?= BASEURL ?>/dashboard/tambah-tanggapan/<?= $data['laporan']['id_pengaduan'] ?>" <?= ($data['petugas']['level'] != 2) ? 'title="Hanya petugas yang diperkenankan untuk menanggapi laporan!"' : '' ?>>
						<h3>Tanggapan</h3>
						<textarea placeholder="Tanggapan anda...." name="response" <?= ($data['petugas']['level'] != 2) ? 'disabled' : '' ?>><?= (isset($_SESSION['response'])) ? $_SESSION['response'] : '' ?></textarea>
						<button type="submit" name="comment" <?= ($data['petugas']['level'] != 2) ? 'disabled' : '' ?>>TANGGAPI</button>
					</form>
					
					<?php
				}
				
				?>
				<div class="comment">
					<?php
					
					if ($data['tanggapan'] != NULL) {
						foreach ($data['tanggapan'] as $comment) {
							?>
							
							<div>
								<strong><?= $comment['nama_petugas'] ?> | <?= ($comment['level'] == 1) ? 'Admin' : 'Petugas' ?></strong>
								<span><?= Data_model::timeCounter($comment['tgl_tanggapan']) ?></span>
							</div>
							<p><?= $comment['tanggapan'] ?></p>
							<hr>
							
							<?php
						}
					}else {
						?><center>Belum Ada Tanggapan</center><?php
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
		document.querySelector('#info').innerHTML = 'Apakah anda yakin ingin menghapus laporan ini?';
	}

	function closeDelPopup(){
		document.querySelector('.popup').classList.add('hide');
	}
</script>

<?php

if (isset($_SESSION['response'])) {
	unset($_SESSION['response']);
}

?>