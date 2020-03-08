	<footer>
		<a class="logo" href="<?= BASEURL ?>">LAPOR!</a>
		<span>Kami membantu anda untuk menyalurkan aspirasi anda kepada instansi yang berwenang demi tercapainya kepuasan anda.</span>
		<div>
			<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-facebook.png" alt=""></a>
			<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-instagram.png" alt=""></a>
			<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-twitter.png" alt=""></a>
			<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-youtube.png" alt=""></a>
		</div>
	</footer>
	
	<div id="modal-login" class="<?= $data['modalsignin'] ?>">
		<form method="post" action="<?= BASEURL ?>/login">
			<a href="javascript:void(0)" onclick="closemodal()"><img src="<?= BASEURL ?>/assets/img/icon/times.png" alt=""></a>
			<h2>Login</h2>
			<span>Masukkan username dan password anda untuk melanjutkan!</span>
			<div>
				<img src="<?= BASEURL ?>/assets/img/icon/user.png" alt="">
				<input type="text" name="username" placeholder="Username" id="focus-login" autofocus>
			</div>
			<div>
				<img src="<?= BASEURL ?>/assets/img/icon/lock.png" alt="">
				<input type="password" name="password" placeholder="Password">
			</div>
			<button type="submit" class="bg-flat bg-primary" name="login">Login</button>
			<a href="javascript:void(0)" onclick="opensignup()">Belum Punya Akun?</a>
		</form>
	</div>
	
	<div id="modal-signup" class="<?= $data['modalsignup'] ?>">
		<form method="post" action="<?= BASEURL ?>">
			<a href="javascript:void(0)" onclick="closemodal()"><img src="<?= BASEURL ?>/assets/img/icon/times.png" alt=""></a>
			<h2>Daftar</h2>
			<span>Masukkan data - data anda sebagai berikut!</span>
			<div>
				<div>
					<img src="<?= BASEURL ?>/assets/img/icon/hashtag.png" alt="">
					<input type="number" min="0" placeholder="Nomor NIK" id="focus-signup">
				</div>
				<div>
					<img src="<?= BASEURL ?>/assets/img/icon/user.png" alt="">
					<input type="text" placeholder="Nama Lengkap">
				</div>
			</div>
			<div>
				<div>
					<img src="<?= BASEURL ?>/assets/img/icon/user.png" alt="">
					<input type="text" placeholder="Username" autofocus>
				</div>
				<div>
					<img src="<?= BASEURL ?>/assets/img/icon/lock.png" alt="">
					<input type="password" placeholder="Password">
				</div>
			</div>
			<div>
				<img src="<?= BASEURL ?>/assets/img/icon/phone-book.png" alt="">
				<input type="number" min="0" placeholder="Nomor Telepon">
			</div>
			<button type="submit" class="bg-flat bg-primary" name="signup">Daftar</button>
			<a href="javascript:void(0)" onclick="openlogin()">Sudah Punya Akun?</a>
		</form>
	</div>
	
	<script type="text/javascript">
	function closemodal(){
		document.getElementById('modal-login').classList.add('hide');
		document.getElementById('modal-signup').classList.add('hide');
	}
	
	function showmodallogin(){
		document.getElementById('modal-login').classList.remove('hide');
		window.setTimeout(function (){
			document.getElementById('focus-login').focus();
		}, 100);
	}
	
	function showmodalsignup(){
		document.getElementById('modal-signup').classList.remove('hide');
		window.setTimeout(function(){
			document.getElementById('focus-signup').focus();
		}, 100)
	}
	
	function openlogin(){
		document.getElementById('modal-login').classList.remove('hide');
		document.getElementById('modal-signup').classList.add('hide');
		window.setTimeout(function(){
			document.getElementById('focus-login').focus();
		}, 100);
	}
	
	function opensignup(){
		document.getElementById('modal-login').classList.add('hide');
		document.getElementById('modal-signup').classList.remove('hide');
		window.setTimeout(function(){
			document.getElementById('focus-signup').focus();
		}, 100)
	}
	
	window.onclick = function(event){
		if (event.target == document.getElementById('modal-login')) {
			document.getElementById('modal-login').classList.add('hide');
		}else if (event.target == document.getElementById('modal-signup')) {
			document.getElementById('modal-signup').classList.add('hide');
		}
	}
	</script>
	
	<?php
	
	if (isset($data['js'])) {
		foreach ($data['js'] as $js) {
			?><script src="<?= BASEURL ?>/assets/js/<?= $js ?>"></script><?php
		}
	}
	
	?>
</body>
</html>