	<div class="content">
		<h2>Tinjau Data Aduan</h2>
		<div>
			<span>Status: <strong>Dalam proses</strong></span>
			<button onclick="cetak()">Cetak Laporan</button>
		</div>
		<div>
			<div class="report">
				<div>
					<div class="header">
						<span><?= $data['data_aduan'][0]['id_pengaduan'] ?></span>
						<span><?= date('l, d F Y', $data['data_aduan'][0]['tgl_pengaduan']) ?></span>
					</div>
					<span>Dari: <strong><?= $data['data_aduan'][0]['nama'] ?></strong></span>
					<p><?= $data['data_aduan'][0]['isi_laporan'] ?></p>
				</div>
			</div>
			<div class="action">
				<form>
					<h3>Tanggapan</h3>
					<textarea placeholder="Tanggapan anda...."></textarea>
					<button type="submit">TANGGAPI</button>
				</form>
				<div class="comment">
					<div>
						<strong>Aldi Pradana | Petugas</strong>
						<span>2 Menit yang lalu</span>
					</div>
					<p>Baik, saya akan tindak lanjuti!</p>
					<hr>
					<div>
						<strong>Fredika Putra | Admin</strong>
						<span>5 Menit yang lalu</span>
					</div>
					<p>Terima kasih atas kepercayaan anda terhadap kami, kami akan melanjutkan kasus ini sampai tuntas. Mohon untuk tetap bersabar!</p>
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