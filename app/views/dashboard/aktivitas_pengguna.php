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
				
				if ($handle = opendir('app/log/user_activity')) {
					while (false !== ($file = readdir($handle))) {
						if ($file != "." && $file != "..") {
							$files[] = file('app/log/user_activity/' . $file);
						}else {
							$files = NULL;
						}
					}
					closedir($handle);
				}
				
				if ($files != NULL) {
					foreach (array_reverse($files) as $line) {
						foreach (array_reverse($line) as $activity) {
							$part = explode('|', $activity);
							?>
							
							<div>
								<div>
									<span><?= strftime("%d", intval($part[2])) ?></span>
									<span><?= strftime("%B", intval($part[2])) ?></span>
								</div>
								<div>
									<div>
										<?php
										
										if (file_exists('assets/img/users/' . $part[0] . '.jpg')) {
											?><img src="<?= BASEURL ?>/assets/img/users/<?= $part[0] . '.jpg' ?>?=<?= filemtime('assets/img/users/' . $part[0] . '.jpg') ?>"><?php
										}else {
											?><img src="<?= BASEURL ?>/assets/img/users/default.png"><?php
										}
										
										?>
										<div>
											<!-- <strong><?= $part[0] ?></strong> -->
											<strong>Tets Nama.</strong>
											<span><?= $part[1] ?></span>
											<span><?= strftime("%H:%M", intval($part[2])) ?></span>
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
				<div>
					<h2>Sedang Online</h2>
					
					
						
						<?php
						
						if ($data['pengguna'] != NULL) {
							foreach ($data['pengguna'] as $user) {
								if ($handle = opendir('app/log/last_login')) {
									while (false !== ($file = readdir($handle))) {
										if ($file != "." && $file != "..") {
											$cekId = explode('.', $file);
											if ($cekId[0] == $user['id'] && $cekId[0] != $_SESSION['petugasID']) {
												$files = file('app/log/last_login/' . $file);
											}
										}else {
											$files = NULL;
										}
									}
									closedir($handle);
								}
								
								if ($files != NULL) {
									if ($files[0] == 'active') {
										
										?>
										
										<div>
										
											<?php
											if (file_exists('assets/img/users/' . $user['id'] . '.jpg')) {
												?><img src="<?= BASEURL ?>/assets/img/users/<?= $user['id'] . '.jpg' ?>?=<?= filemtime('assets/img/users/' . $user['id'] . '.jpg') ?>"><?php
											}else {
												?><img src="<?= BASEURL ?>/assets/img/users/default.png"><?php
											}
											
											?>
											
											<div>
												<span><?= $user['nama'] ?></span>
												<span>@<?= $user['username'] ?></span>
											</div>
											
										<?php
										?>
										</div>
										<?php
										
									}
								}
							}
						}
						
						?>
					
				</div>
			</div>
		</div>
	</div>
</main>