		<div>
			<span>404</span>
			<span>Halaman Tidak Ditemukan!</span>
			<p>Halaman yang anda cari mungkin telah dihapus atau tidak dapat diakses untuk sementara. <a href="<?= BASEURL ?>">Kembali ke halaman beranda</a></p>
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