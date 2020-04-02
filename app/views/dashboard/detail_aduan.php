	<div class="content">
		<h2>Tinjau Data Aduan</h2>
		<div>
			<span>Status: <strong><?= ($data['laporan'][0]['status'] == 1) ? 'Selesai' : 'Dalam Proses' ?></strong></span>
			<button onclick="cetak()">Cetak Laporan</button>
		</div>
		<div>
			<div class="report">
				<div>
					<div class="header">
						<span><?= $data['laporan'][0]['id_pengaduan'] ?></span>
						<span><?= date('l, d F Y', $data['laporan'][0]['tgl_pengaduan']) ?></span>
					</div>
					<span>Dari: <strong><?= $data['laporan'][0]['nama'] ?></strong></span>
					<p><?= $data['laporan'][0]['isi_laporan'] ?></p>
				</div>
			</div>
			<div class="action">
				<form method="post" action="<?= BASEURL ?>/dashboard/report-response/<?= $data['id'] ?>">
					<h3>Tanggapan</h3>
					<textarea placeholder="Tanggapan anda...." name="response"><?= (isset($_SESSION['response'])) ? $_SESSION['response'] : '' ?></textarea>
					<button type="submit" name="comment">TANGGAPI</button>
				</form>
				<div class="comment">
					<?php
					
					if ($data['tanggapan'] != NULL) {
						foreach ($data['tanggapan'] as $comment) {
							?>
							
							<div>
								<strong><?= $comment['nama_petugas'] ?> | <?= ($comment['level'] == 1) ? 'Admin' : 'Petugas' ?></strong>
								<span><?= date('l, H:i:s', $comment['tgl_tanggapan']) ?></span>
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
function cetak() {
window.print();
}
</script>

<?php

if (isset($_SESSION['response'])) {
	unset($_SESSION['response']);
}

?>