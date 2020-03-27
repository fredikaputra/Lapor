	<div class="content">
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
							<td><?= date("l, d F Y", $laporan[1]) ?></td>
							<td><p><?= $laporan[3] ?></p></td>
							<td>
								<?php
								
								if ($laporan[4] == NULL) {
									echo 'Tidak ada gambar';
								}else {
									?>
									
									<img width="100" src="<?= BASEURL ?>/assets/img/laporan/<?= $laporan[4] ?>" alt="">
									
									<?php
								}
								
								?>
							</td>
							<td>
								<?php
								
								if ($laporan[5] == '0') {
									echo 'Dalam Proses';
								}else if ($laporan[5] == '1') {
									echo 'Selesai';
								}
								
								?>
							</td>
							<td><a href="<?= BASEURL ?>/dashboard/data-aduan/<?= $laporan[0] ?>">Tinjau</a></td>
						</tr>
						
						<?php
						$no++;
					}
				}
				
				?>
			</tbody>
		</table>
	</div>
</main>