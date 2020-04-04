<header>
	<h1>Data</h1>
</header>
<main>
	<h2>Riwayat Aduan</h2>
	<span>Semua data aduan anda</span>
	<div>
		<table>
			<thead>
				<tr>
					<td>Waktu</td>
					<td>Isi Laporan</td>
					<td>Status</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php
				
				if (isset($data['laporan'])) {
					foreach ($data['laporan'] as $laporan) {
						?>
						
						<tr>
							<td><?= date('d/m/Y', $laporan['tgl_pengaduan']) ?></td>
							<td>
								<div><p><?= $laporan['isi_laporan'] ?></p></div>
							</td>
							<td><?= ($laporan['status'] == 0) ? 'Dalam Proses' : 'Selesai' ?></td>
							<td><a href="<?= BASEURL ?>/riwayat-aduan/detail/<?= $laporan['id_pengaduan'] ?>">Lihat</a></td>
						</tr>
						
						<?php
					}
				}
				
				?>
			</tbody>
		</table>
	</div>
</main>