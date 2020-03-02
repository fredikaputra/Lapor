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
				<a href="">Apps <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="">Menu <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="">Dashbaord <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="">Dashbaord <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
			</nav>
		
			<div>
				<main>
					<div class="pageinfo">
						<span>Dashboard</span>
						<div class="breadcrumbs">Lapor / Dashboard</div>
					</div>
					
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
										<button type="reset" class="warning hide" onclick="hide()" id="cancelSaveUserProfile">Batal</button>
										<button type="submit" class="success hide" id="saveUserProfile" name="updateProfile">Simpan</button>
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
										<span>Pengguna Baru</span>
										<span>78k</span>
									</div>
								</div>
								<div class="card">
									<i class="fa fa-user"></i>
									<div>
										<span>Pengguna Baru</span>
										<span>78k</span>
									</div>
								</div>
								<div class="card">
									<i class="fa fa-user"></i>
									<div>
										<span>Pengguna Baru</span>
										<span>78k</span>
									</div>
								</div>
								<div class="card">
									<i class="fa fa-user"></i>
									<div>
										<span>Pengguna Baru</span>
										<span>78k</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
		</div>
		<script src="<?=  BASEURL ?>/assets/js/onChangeInput.js"></script>
	</body>
</html>