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
				
				if ($data['activity'] != NULL) {
					foreach ($data['activity'] as $activity) {
						?>
						
						<div>
							<div>
								<span><?= strftime("%d", intval($activity[2])) ?></span>
								<span><?= strftime("%B", intval($activity[2])) ?></span>
							</div>
							<div>
								<div>
									<?php
									
									if (file_exists('assets/img/users/' . $activity[0] . '.jpg')) {
										?><img src="<?= BASEURL ?>/assets/img/users/<?= $activity[0] . '.jpg' ?>?=<?= filemtime('assets/img/users/' . $activity[0] . '.jpg') ?>"><?php
									}else {
										?><img src="<?= BASEURL ?>/assets/img/users/default.png"><?php
									}
									
									?>
									<div>
										<strong><?= $activity[3] ?></strong>
										<span><?= $activity[1] ?></span>
										<span><?= strftime("%H:%M", intval($activity[2])) ?></span>
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
					
					<div>
					
						<?php
						if (file_exists('assets/img/users/' . $data['photo'])) {
							?><img src="<?= BASEURL ?>/assets/img/users/<?= $data['photo'] ?>?=<?= filemtime('assets/img/users/' . $data['photo']) ?>"><?php
						}else {
							?><img src="<?= BASEURL ?>/assets/img/users/default.png"><?php
						}
						
						?>
						
						<div>
							<span><?= $data['petugas']['nama_petugas'] ?></span>
							<span>@<?= $data['petugas']['username'] ?></span>
						</div>
						
					</div>
					
					
						
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