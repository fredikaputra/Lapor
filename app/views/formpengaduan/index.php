<header>
	<h1>Sampaikan Aspirasi Anda</h1>
</header>

<main>
	<h2>Laporkan Segera</h2>
	<span>Laporan anda akan diverifikasi dan diteruskan kepada instansi berwenang</span>
	<form action="<?= BASEURL ?>" method="post">
		<div>
			<div>
				<span>Pelapor</span>
				<span>-</span>
			</div>
			<div>
				<span>Waktu Tercatat</span>
				<span>16:16, 04 March 2020</span>
			</div>
		</div>
		
		<textarea name="name" placeholder="Ketik laporan anda!"></textarea>
		<div>
			<input type="file" name="photo">
			<button class="bg-flat bg-primary" type="submit" name="insertPengaduan">Lapor!</button>
		</div>
	</form>
</main>