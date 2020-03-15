<main>
	<div>
		<h1>Sampaikan Aspirasi Anda</h1>
		<span>Laporan anda akan diverifikasi dan diteruskan kepada instansi berwenang</span>
		<form action="<?= BASEURL ?>" method="post">
			<textarea name="name" placeholder="Ketik laporan anda..."></textarea>
			<label><img src="<?= BASEURL ?>/assets/img/icon/upload.png" alt="">Upload
				<input type="file" name="" value="">
			</label>
			<button type="submit" name="report">LAPORKAN!</button>
		</form>
	</div>
</main>