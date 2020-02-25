<header>
	<h1>Sampaikan Aspirasi Anda</h1>
</header>

<main>
	<h2 class="section-title">Laporkan Segera</h2>
	<span class="sub-section-title">Laporan anda akan diverifikasi dan diteruskan kepada instansi berwenang</span>
	
	<form action="" method="post" enctype="multipart/form-data">
		<div>
			<div>
				<span>Pelapor</span>
				<span>Rama Surya</span>
			</div>
			<div>
				<span>Waktu Tercatat</span>
				<span>12:32, 23 Juni 2020</span>
			</div>
		</div>
		<div>
			<label for="perihal">Perihal</label>
			<input type="text" name="perihal" id="perihal" placeholder="Kecurangan BBM" required>
		</div>
		<div>
			<textarea name="laporan" placeholder="Ketik laporan anda" required></textarea>
		</div>
		<div>
			<input type="file" name="photo" accept="image/*">
			<button type="submit" name="report">Lapor</button>
		</div>
	</form>
</main>

<script type="text/javascript"> 
	$('textarea').on('input', function(){
		this.style.height = 'auto';
		this.style.height = (this.scrollHeight) + 'px';
	});
</script> 