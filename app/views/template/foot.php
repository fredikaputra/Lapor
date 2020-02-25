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
		
		<div id="signin-modal">
			<div class="modal-content">
				<i class="fa fa-times" id="close"></i>
				<h2 class="section-title">Login</h2>
				<span class="sub-section-title">Masukkan username dan password anda untuk melanjutkan</span>
				<form action="" method="post">
					<div><i class="fa fa-user fa-fw"></i><input type="text" name="username" placeholder="Username"></div>
					<div><i class="fa fa-lock fa-fw"></i><input type="password" name="password" placeholder="Password"></div>
					<a href="">Lupa Password?</a>
					<button type="submit" name="login">Login</button>
					<a href="">Belum punya akun? Daftar Sekarang!</a>
				</form>
			</div>
		</div>
		
		<script type="text/javascript">
			var modal = document.getElementById('signin-modal');
			var openbtn = document.getElementById('signin');
			var closebtn = document.getElementById('close');
			
			openbtn.onclick = function(){
				modal.style.display = 'block';
			}
			
			closebtn.onclick = function(){
				modal.style.display = 'none';
			}
			
			window.onclick = function(event){
				if (event.target == modal) {
					modal.style.display = 'none';
				}
			}
		</script>
	</body>
</html>