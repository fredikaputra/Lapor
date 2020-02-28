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
		
		<div id="signin-modal" <?= $data['modalstyle'] ?>>
			<div class="modal-content">
				<i class="fa fa-times" id="closeSignin"></i>
				<h2 class="section-title">Login</h2>
				<span class="sub-section-title">Masukkan username dan password anda untuk melanjutkan</span>
				<form action="" method="post">
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
		
		<script type="text/javascript">
			var signin_modal = document.getElementById('signin-modal');
			var signup_modal = document.getElementById('signup-modal');
			var signinbtn = document.getElementById('signin');
			var signupbtn = document.getElementById('signup');
			var signupmodalbtn = document.getElementById('signup-modal-btn');
			var siginpmodalbtn = document.getElementById('signin-modal-btn');
			var closebtnsignin = document.getElementById('closeSignin');
			var closebtnsignup = document.getElementById('closeSignup');
			
			signinbtn.onclick = function(){
				signin_modal.style.display = 'block';
			}
			
			signupbtn.onclick = function(){
				signup_modal.style.display = 'block';
			}
			
			signupmodalbtn.onclick = function(){
				signin_modal.style.display = 'none';
				signup_modal.style.display = 'block';
			}
			
			siginpmodalbtn.onclick = function(){
				signup_modal.style.display = 'none';
				signin_modal.style.display = 'block';
			}
			
			closebtnsignin.onclick = function(){
				signin_modal.style.display = 'none';
			}
			
			closebtnsignup.onclick = function(){
				signup_modal.style.display = 'none';
			}
			
			window.onclick = function(event){
				if (event.target == signin_modal || event.target == signup_modal) {
					signin_modal.style.display = 'none';
					signup_modal.style.display = 'none';
				}
			}
		</script>
	</body>
</html>