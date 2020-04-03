	<div class="content">
		<div>
			<h2>Data Aduan</h2>
			<table>
				<thead>
					<tr>
						<td>Waktu</td>
						<td>Dari</td>
						<td>Isi Laporan</td>
						<td>Foto</td>
						<td>Status</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php
					
					if ($data['laporan'] == !NULL) {
						foreach ($data['laporan'] as $laporan) {
							?>
							
							<tr>
								<td><?= strftime("%A, %d %B %Y", $data['laporan'][0]['tgl_pengaduan']) ?></td>
								<td><?= $laporan['nama'] ?></td>
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
									}else if ($laporan['status'] == '1') {
										echo 'Selesai';
									}
									
									?>
								</td>
								<td><a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan['id_pengaduan'] ?>">Tinjau</a></td>
							</tr>
							
							<?php
						}
					}
					
					?>
				</tbody>
			</table>
		</div>
	</div>
</main>