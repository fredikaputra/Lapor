<main>
	<div>
		<h1>Dashboard</h1>
		<span>Riwayat laporan yang pernah anda ajukan</span>
		<div class="riwayat">
			<table>
				<thead>
					<tr>
						<td>#</td>
						<td>Isi Laporan</td>
						<td>Gambar</td>
						<td>Status</td>
					</tr>
				</thead>
				<tbody>
					<?php
					
					$no = 1;
					foreach ($data['report'] as $row) {
						?>
						
						<tr>
							<td><?= $no ?></td>
							<td><p><?= $row[3]; ?></p></td>
							<td style="width: 8cm;">
								<?php
								
								if ($row[4] === NULL) {
									echo 'Tidak ada gambar';
								}else {
									?>
									
									<img src="<?= BASEURL ?>/assets/img/aduan/<?= $row[4] ?>" alt="">
									
									<?php
								}
								
								?>
							</td>
							<td style="width: 5cm;">Dalam Proses</td>
						</tr>
						
						<?php
						$no++;
					}
					
					?>
				</tbody>
			</table>
		</div>
	</div>
</main>