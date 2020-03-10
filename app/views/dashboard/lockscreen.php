		<form action="<?= BASEURL ?>/login/unlock" method="post">
			<h2>Masukkan Password!</h2>
			<span>Hallo Fredika, masukkan password untuk kembali ke dashboard!</span>
			<img src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
			<span>Fredika Putra</span>
			<div>
				<input type="password" name="password" placeholder="Password" autofocus required>
				<img src="<?= BASEURL ?>/assets/img/icon/lock.png" alt="">
			</div>
			<button type="submit" name="relogin">Unlock</button>
			<span>Bukan anda? Silahkan <a href="<?= BASEURL ?>/logout">Login</a> ulang</span>
		</form>
	</body>
</html>
<!-- <button type="submit" name="relogin" class="bg-flat bg-primary">Unlock</button> -->
