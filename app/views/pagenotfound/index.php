		<div>
			<span>404</span>
			<span>Halaman Tidak Ditemukan!</span>
			<p>Halaman yang anda cari mungkin telah dihapus atau tidak dapat diakses untuk sementara. <a href="<?= BASEURL ?>">Kembali ke halaman beranda</a></p>
			<div>
				<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-facebook.png" alt=""></a>
				<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-instagram.png" alt=""></a>
				<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-twitter.png" alt=""></a>
				<a href=""><img src="<?= BASEURL ?>/assets/img/icon/social-youtube.png" alt=""></a>
			</div>
		</div>
		
		<?php
		
		if (isset($data['js'])) {
			foreach($data['js'] as $js){
				?><script src="<?= BASEURL ?>/assets/js/<?= $js ?>"></script><?php
			}
		}
		
		?>
	</body>
</html>