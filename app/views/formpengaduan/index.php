<header>
	<h1>Sampaikan Aspirasi Anda</h1>
</header>

<main>
	<h2>Laporkan Segera</h2>
	<span>Laporan anda akan diverifikasi dan diteruskan kepada instansi berwenang</span>
	<form action="<?= BASEURL ?>/form-pengaduan/kirim" method="post" id="form" enctype="multipart/form-data">
		<div>
			<div>
				<span>Pelapor</span>
				<span><?= $data['name'] ?></span>
			</div>
			<div>
				<span>Waktu Tercatat</span>
				<span><?= date('H:i, d M Y') ?></span>
			</div>
		</div>
		
		<textarea id="txt" name="msg" placeholder="Ketik laporan anda!" required></textarea>
		<div>
			<input type="file" name="photo">
			<button class="bg-flat bg-primary" type="submit" name="insertPengaduan">Lapor!</button>
		</div>
	</form>
</main>

<script>
	document.getElementById('txt').addEventListener('keydown', function(event){
		if (event.ctrlKey && event.keyCode === 13) {
			document.getElementById('form').submit();
		}
	});
</script>