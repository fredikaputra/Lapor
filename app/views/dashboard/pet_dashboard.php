	<div class="content">
		<div>
			<img src="<?= BASEURL ?>/assets/img/users/default.png" alt="">
			<span>Selamat Datang, <strong><?= $data['name'] ?></strong></span>
			<img src="<?= BASEURL ?>/assets/img/icon/computer.png">
		</div>
		<div>
			<div>
				<form method="post" action="<?= BASEURL ?>/dashboard/update-profile" enctype="multipart/form-data">
					<h2>Pengaturan Profil</h2>
					<div>
						<?php
						
						if (file_exists('assets/img/users/' . $data['photo'])) {
							?><img src="<?= BASEURL ?>/assets/img/users/<?= $data['photo'] ?>" alt=""><?php
						}else {
							?><img src="<?= BASEURL ?>/assets/img/users/default.png" alt=""><?php
						}
						
						?>
						<label><img src="<?= BASEURL ?>/assets/img/icon/camera.png" alt="">
							<input type="file" id="onChange3" onchange="checkValueChange()" name="photo" accept=".jpg">
						</label>
					</div>
					<div>
						<img src="<?= BASEURL ?>/assets/img/icon/circle-user.png" alt="">
						<input type="text" id="onChange1" onkeyup="checkValueChange()" value="<?= $data['name'] ?>" name="name" autocomplete="off">
					</div>
					<div>
						<img src="<?= BASEURL ?>/assets/img/icon/circle-phone-book.png" alt="">
						<input type="number" id="onChange2" onkeyup="checkValueChange()" value="<?= $data['phone'] ?>" name="phone" autocomplete="off">
					</div>
					<div>
						<a href="<?= BASEURL ?>/dashboard/change-pass">Ganti Password</a>
						<div>
							<button type="reset" class="hide" onclick="hide()" id="cancelSaveUserProfile">Batal</button>
							<button type="submit" class="hide" name="updateprofile" id="saveUserProfile">Simpan</button>
						</div>
					</div>
				</form>
			</div>
			
			<div>
				<div>
					<table>
						<caption>Aduan Laporan Terbaru</caption>
						<thead>
							<tr>
								<td>#ID</td>
								<td>Waktu</td>
								<td>Dari</td>
								<td>Laporan</td>
								<td>Status</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>LPRDID64J87</td>
								<td>3 Menit yang lalu</td>
								<td>Lada Sattar</td>
								<td>
									<p>Tolong pindahkan kabel listrik yang ada di atas rumah saya, karena itu sanggat mengganggu!</p>
								</td>
								<td>Dalam Proses</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>

<script type="text/javascript">
	var saveBtn = document.getElementById('saveUserProfile');
	var cancelSaveBtn = document.getElementById('cancelSaveUserProfile');

	function checkValueChange(){
		var defaultVal1 = document.getElementById('onChange1').defaultValue;
		var curentVal1 = document.getElementById('onChange1').value;
		var defaultVal2 = document.getElementById('onChange2').defaultValue;
		var curentVal2 = document.getElementById('onChange2').value;
		var defaultVal3 = document.getElementById('onChange3').defaultValue;
		var curentVal3 = document.getElementById('onChange3').value;
		
		// check if value is change
		if (defaultVal1 == curentVal1 && defaultVal2 == curentVal2 && defaultVal3 == curentVal3) {
			saveBtn.classList.add('hide');
			cancelSaveBtn.classList.add('hide');
		}else {
			saveBtn.classList.remove('hide');
			cancelSaveBtn.classList.remove('hide');
		}
	}

	// hide function
	function hide(){
		saveBtn.classList.add('hide');
		cancelSaveBtn.classList.add('hide');
	}
</script>