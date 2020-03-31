<header>
	<h1>Dashboard</h1>
</header>
<main>
	<h2>Riwayat Aduan</h2>
	<span>Semua data aduan anda</span>
	<table>
		<thead>
			<tr>
				<td>#</td>
				<td>Waktu</td>
				<td>Isi Laporan</td>
				<td>Foto</td>
				<td>Status</td>
			</tr>
		</thead>
		<tbody>
			<?php
			
			if (isset($data['report'])) {
				$no = 1;
				foreach ($data['report'] as $report) {
					?>
					
					<tr>
						<td><?= $no ?></td>
						<td><?= date('l, d F Y', $report['tgl_pengaduan']) ?></td>
						<td><p><?= $report['isi_laporan'] ?></p></td>
						<td><?= (isset($report['foto'])) ? '1 Gambar' : 'Tidak ada gambar' ?></td>
						<td><?= ($report['status'] == 0) ? 'Dalam Proses' : 'Selesai' ?></td>
					</tr>
					
					<?php
					$no++;
				}
			}
			
			?>
		</tbody>
	</table>
</main>