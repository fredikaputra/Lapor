<header>
	<h1>Data</h1>
</header>
<main>
	<h2>Riwayat Aduan</h2>
	<span>Detail data aduan</span>
	<div class="report">
		<div class="header">
			<span><?= $data['laporan'][0]['id_pengaduan'] ?></span>
			<span><?= date('l, d F Y', $data['laporan'][0]['tgl_pengaduan']) ?></span>
		</div>
		<p><?= $data['laporan'][0]['isi_laporan'] ?></p>
	</div>
</main>