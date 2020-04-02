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
			
			if (isset($data['laporan'])) {
				$no = 1;
				foreach ($data['laporan'] as $laporan) {
					?>
					
					<tr>
						<td><?= $no ?></td>
						<td><?= date('l, d F Y', $laporan['tgl_pengaduan']) ?></td>
						<td><p><?= $laporan['isi_laporan'] ?></p></td>
						<td><?= (isset($laporan['foto'])) ? '1 Gambar' : 'Tidak ada gambar' ?></td>
						<td><?= ($laporan['status'] == 0) ? 'Dalam Proses' : 'Selesai' ?></td>
					</tr>
					
					<?php
					$no++;
				}
			}
			
			?>
		</tbody>
	</table>
</main>