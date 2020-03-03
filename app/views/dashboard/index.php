		<div class="wrapper">
			<nav>
				<div class="profile">
					<img src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
					<span><?= $data['row']['nama_petugas'] ?></span>
					<span style="text-transform: capitalize"><?= $data['row']['level'] ?></span>
					<div class="group">
						<a href=""><i class="fa fa-gear"></i></a>
						<a href="<?= BASEURL ?>/logout"><i class="fa fa-sign-out"></i></a>
					</div>
				</div>
				<a class="active" href="">Dashbaord <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="">Laporan Pengaduan <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="">Pengguna <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
			</nav>
		
			<div>
				<main>
					<div class="pageinfo">
						<span>Dashboard</span>
						<div class="breadcrumbs">Lapor / Dashboard</div>
					</div>
					
					<div>
						<div class="information">
							<div>
								<form action="">
									<span>User Profile</span>
									<div><i class="fa fa-user fa-fw"></i><input type="text" id="onChange1" onkeyup="checkValueChange()" name="name" placeholder="Nama Lengkap" value="<?= $data['row']['nama_petugas'] ?>" autocomplete="off" required></div>
									<div><i class="fa fa-user fa-fw"></i><input type="text" id="onChange2" name="username" onkeyup="checkValueChange()" placeholder="Username" value="<?= $data['row']['username'] ?>" autocomplete="off" required></div>
									<div><i class="fa fa-phone fa-fw"></i><input type="number" id="onChange3" name="phone" onkeyup="checkValueChange()" placeholder="Nomor Telepon" value="<?= $data['row']['telp'] ?>" autocomplete="off" required></div>
									<div>
										<a href="" class="changepassword">Ganti Password</a>
										<div>
											<button type="reset" class="hide" onclick="hide()" id="cancelSaveUserProfile">Batal</button>
											<button type="submit" class="hide" id="saveUserProfile" name="updateProfile">Simpan</button>
										</div>
									</div>
								</form>
							</div>
							<div class="data">
								<div class="greet">
									<img class="user" src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
									<span>Selamat datang, <strong><?= $data['row']['nama_petugas'] ?></strong></span>
									<img class="icon" src="<?= BASEURL ?>/assets/img/icon/dashboard-icon1.png" alt="">
								</div>
								<div class="card-info">
									<div class="card">
										<i class="fa fa-user"></i>
										<div>
											<span>Pengguna Lapor!</span>
											<span>78k</span>
										</div>
									</div>
									<div class="card">
										<i class="fa fa-user"></i>
										<div>
											<span>Petugas & Admin</span>
											<span>78k</span>
										</div>
									</div>
									<div class="card">
										<i class="fa fa-user"></i>
										<div>
											<span>Laporan Tercatat</span>
											<span>78k</span>
										</div>
									</div>
									<div class="card">
										<i class="fa fa-user"></i>
										<div>
											<span>Laporan Tervirifikasi</span>
											<span>78k</span>
										</div>
									</div>
								</div>
							</div><!-- data -->
						</div><!-- information -->
						
						<div class="viewpengaduanterbaru">
							<h2>Aduan Laporan Terbaru</h2>
							<table>
								<tr>
									<th>#ID</th>
									<th>Waktu</th>
									<th>Dari</th>
									<th>Laporan</th>
									<th>Status</th>
								</tr>
								<tr>
									<td>#LPRID1A3C84A</td>
									<td>2 Jam yang lalu</td>
									<td>Lada Sattar</td>
									<td>Tolong pindahkan kabel listrik yang ada di atas rumah saya, karena itu sanggat mengganggu!</td>
									<td>Proses</td>
								</tr>
								<tr>
									<td>#LPRID1A3C84A</td>
									<td>2 Jam yang lalu</td>
									<td>Lada Sattar</td>
									<td>Tolong pindahkan kabel listrik yang ada di atas rumah saya, karena itu sanggat mengganggu!</td>
									<td>Proses</td>
								</tr>
								<tr>
									<td>#LPRID1A3C84A</td>
									<td>2 Jam yang lalu</td>
									<td>Lada Sattar</td>
									<td>Tolong pindahkan kabel listrik yang ada di atas rumah saya, karena itu sanggat mengganggu!</td>
									<td>Proses</td>
								</tr>
								<tr>
									<td>#LPRID1A3C84A</td>
									<td>2 Jam yang lalu</td>
									<td>Lada Sattar</td>
									<td>Tolong pindahkan kabel listrik yang ada di atas rumah saya, karena itu sanggat mengganggu!</td>
									<td>Proses</td>
								</tr>
							</table>
						</div>
					</div>
				</main>
			</div>
		</div>
		<script src="<?=  BASEURL ?>/assets/js/onChangeInput.js"></script>
	</body>
</html>