		<footer>
			<div class="width">
				<div>
					<a href="<?= BASEURL; ?>">LAPOR!</a>
					<p>Kami membantu anda untuk menyalurkan aspirasi anda kepada instansi yang berwenang demi tercapainya kepuasan anda.</p>
					<div>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-instagram"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
				<div>
					<span>Navigasi</span>
					<a href="<?= BASEURL ?>/lapor">Lapor</a>
					<a href="<?= BASEURL ?>/tentang">Tentang</a>
					<a href="<?= BASEURL ?>/hubungi-kami">Hubungi Kami</a>
				</div>
				<div>
					<span>Kontak</span>
					<a href="mailto:info@lapor.com"><i class="fa fa-envelope fa-fw"></i>info@lapor.com</a>
					<a href=""><i class="fa fa-map-marker fa-fw"></i>Denpasar, Bali</a>
				</div>
			</div>
		</footer>
		
		<div id="signin-modal" <?= isset($data['modalstyle']) ? $data['modalstyle'] : '' ?>>
			<div class="modal-content">
				<i class="fa fa-times" id="closeSignin"></i>
				<h2 class="section-title">Login</h2>
				<span class="sub-section-title">Masukkan username dan password anda untuk melanjutkan</span>
				<form action="<?= BASEURL ?>/login/masyarakat" method="post">
					<div><i class="fa fa-user fa-fw"></i><input type="text" name="username" placeholder="Username" autocomplete="off" required></div>
					<div><i class="fa fa-lock fa-fw"></i><input type="password" name="password" placeholder="Password" autocomplete="off" required></div>
					<a href="">Lupa Password?</a>
					<button type="submit" name="login">Login</button>
					<a href="javascript:void(0)" class="signup" id="signup-modal-btn">Belum punya akun? Daftar Sekarang!</a>
				</form>
			</div>
		</div>
		
		<div id="signup-modal">
			<div class="modal-content">
				<i class="fa fa-times" id="closeSignup"></i>
				<h2 class="section-title">Daftar</h2>
				<span class="sub-section-title">Masukkan data - data anda sebagai berikut!</span>
				<form action="<?= BASEURL ?>/daftar" method="post">
					<div>
						<div><i class="fa fa-list fa-fw"></i><input type="number" name="nik" placeholder="Nomor NIK" autocomplete="off" required></div>
						<div><i class="fa fa-user fa-fw"></i><input type="text" name="name" placeholder="Nama anda" autocomplete="off" required></div>
					</div>
					<div>
						<div><i class="fa fa-user fa-fw"></i><input type="text" name="username" placeholder="Username" autocomplete="off" required></div>
						<div><i class="fa fa-lock fa-fw"></i><input type="password" name="password" placeholder="Password" autocomplete="off" required></div>
					</div>
					<div><i class="fa fa-phone fa-fw"></i><input type="number" name="phone" placeholder="Nomor Telepon" autocomplete="off" required></div>
					<button type="submit" name="login">Daftar</button>
					<a href="javascript:void(0)" class="signin" id="signin-modal-btn">Sudah punya akun? Login sekarang!</a>
				</form>
			</div>
		</div>
		
		<script src="<?= BASEURL ?>/assets/javascript/modal.js" charset="utf-8"></script>
	</body>
</html>