	<div class="content">
		<div>
			<h2>Data Aduan</h2>
			<table>
				<thead>
					<tr>
						<td>#</td>
						<td>Waktu</td>
						<td>Isi Laporan</td>
						<td>Foto</td>
						<td>Status</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php
					
					if ($data['data_aduan'] == !NULL) {
						$no = 1;
						foreach ($data['data_aduan'] as $laporan) {
							?>
							
							<tr>
								<td><?= $no ?></td>
								<td><?= date("l, d F Y", $laporan['tgl_pengaduan']) ?></td>
								<td><p><?= $laporan['isi_laporan'] ?></p></td>
								<td>
									<?php
									
									if ($laporan['foto'] == NULL) {
										echo 'Tidak ada gambar';
									}else {
										?>
										
										<button type="button">Lihat Gambar</button>
										
										<?php
									}
									
									?>
								</td>
								<td>
									<?php
									
									if ($laporan['status'] == '0') {
										echo 'Dalam Proses';
									}else if ($laporan[5] == '1') {
										echo 'Selesai';
									}
									
									?>
								</td>
								<td><a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan['id_pengaduan'] ?>">Tinjau</a></td>
							</tr>
							
							<?php
							$no++;
						}
					}
					
					?>
				</tbody>
			</table>
		</div>
	</div>
</main>