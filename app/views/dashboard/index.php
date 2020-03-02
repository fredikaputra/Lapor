		<div class="wrapper">
			<nav>
				<div class="profile">
					<img src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
					<span>Amelia</span>
					<span>Head Admin</span>
					<div class="group">
						<a href=""><i class="fa fa-gear"></i></a>
						<a href=""><i class="fa fa-sign-out"></i></a>
					</div>
				</div>
				<a class="active" href="">Dashbaord <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="">Apps <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="">Menu <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="">Dashbaord <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
				<a href="">Dashbaord <img src="<?= BASEURL ?>/assets/img/icon/chevron-right.png" alt=""></a>
			</nav>
		
			<div>
				<header>
					<div class="left">
						<a href="">DASHBOARD</a>
					</div>
					<div class="right">
						<div class="user">
							<img src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
							<span>Amelia</span>
						</div>
					</div>
				</header>
				<main>
					<div class="pageinfo">
						<span>Dashboard</span>
						<div class="breadcrumbs">Lapor / Dashboard</div>
					</div>
					
					<div class="information">
						<div>
							<form action="">
								<span>User Profile</span>
								<div><i class="fa fa-user fa-fw"></i><input type="text" name="name" placeholder="Nama Lengkap" value="<?= $data['row']['nama'] ?>" autocomplete="off" required></div>
								<div><i class="fa fa-user fa-fw"></i><input type="text" name="username" placeholder="Username" value="<?= $data['row']['username'] ?>" autocomplete="off" required></div>
								<div><i class="fa fa-phone fa-fw"></i><input type="number" name="phone" placeholder="Nomor Telepon" value="<?= $data['row']['telp'] ?>" autocomplete="off" required></div>
								<div>
									<a href="" class="danger">Ganti Password</a>
									<button type="submit" class="success" name="updateProfile">Simpan</button>
								</div>
							</form>
						</div>
						<div class="data">
							<div class="greet">
								<img class="user" src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
								<span>Selamat datang, Fredika Putra | <strong>Admin Head</strong></span>
								<img class="icon" src="<?= BASEURL ?>/assets/img/icon/dashboard-icon1.png" alt="">
							</div>
							<div class="card-info">
								<div class="card">
									<i class="fa fa-user success"></i>
									<div>
										<span>Pengguna Baru</span>
										<span>78k</span>
									</div>
								</div>
								<div class="card">
									<i class="fa fa-user success"></i>
									<div>
										<span>Pengguna Baru</span>
										<span>78k</span>
									</div>
								</div>
								<div class="card">
									<i class="fa fa-user success"></i>
									<div>
										<span>Pengguna Baru</span>
										<span>78k</span>
									</div>
								</div>
								<div class="card">
									<i class="fa fa-user success"></i>
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
	</body>
</html>