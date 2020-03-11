		<form action="<?= BASEURL ?>/login/unlock" method="post">
			<h2>Masukkan Password</h2>
			<span>Hallo <?= $data['nickname'] ?>, masukkan password untuk kembali ke dashboard!</span>
			<img src="<?= BASEURL ?>/assets/img/user/user-2.jpg" alt="">
			<span><?= $_SESSION['petugasName'] ?></span>
			<div>
				<input type="password" name="password" placeholder="Password" autofocus required>
				<div>
					<img src="<?= BASEURL ?>/assets/img/icon/lock.png" alt="">
				</div>
			</div>
			<button type="submit" class="bg-flat bg-primary" name="relogin">Unlock</button>
			<span>Bukan anda? Silahkan <a href="<?= BASEURL ?>/logout">Login</a> ulang</span>
		</form>
	</body>
</html>