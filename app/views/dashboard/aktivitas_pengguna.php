	<div class="content">
		<div class="header">
			<div>
				<h1>Aktifitas Pengguna</h1>
				<span>Seluruh aktifitas pengguna saat menggunakan layanan Lapor!.</span>
			</div>
		</div>
		
		<div class="body">
			<div class="history">
				<?php
				
				if ($handle = opendir('app/log')) {
					while (false !== ($file = readdir($handle))) {
						if ($file != "." && $file != "..") {
							$files[] = file('app/log/' . $file);
						}else {
							$files = NULL;
						}
					}
					closedir($handle);
				}
				
				if ($files != NULL) {
					foreach ($files as $line) {
						foreach ($line as $activity) {
							$part = explode('|', $activity);
							?>
							
							<div>
								<div>
									<span><?= strftime("%d", intval($part[2])) ?></span>
									<span><?= strftime("%B", intval($part[2])) ?></span>
								</div>
								<div>
									<div>
										<img src="<?= BASEURL ?>/assets/img/users/<?= $part[0] ?>.jpg">
										<div>
											<!-- <strong><?= $part[0] ?></strong> -->
											<strong>Tets Nama.</strong>
											<span><?= $part[1] ?></span>
											<span><?= strftime("%H:%I", intval($part[2])) ?></span>
										</div>
										<div>
											<a href="#">
												<img src="<?= BASEURL ?>/assets/img/icon/eye.png">
											</a>
										</div>
									</div>
								</div>
							</div>
							
							<?php
						}// code...
					}
				}else {
					?>
					
					<div style="display: block; text-align: center; background: white; padding: 20px;">
						<strong>Tidak ada aktivitas</strong>
					</div>
					
					<?php
				}
				
				?>
			</div>
			<div class="online">
				yang online
			</div>
		</div>
	</div>
</main>