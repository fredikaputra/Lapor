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
				<span><?= $data['masyarakat']['name'] ?></span>
			</div>
			<div>
				<span>Waktu Tercatat</span>
				<span><?= date('H:i, d F Y') ?></span>
			</div>
		</div>
		<div>
			<label for="perihal">Perihal</label>
			<input type="text" name="perihal" id="perihal" placeholder="Kecurangan BBM" autocomplete="off" required>
		</div>
		<div>
			<textarea name="laporan" id="msg" placeholder="Ketik laporan anda" required></textarea>
		</div>
		<div>
			<input type="file" name="photo" accept="image/*">
			<button type="submit" name="report">Lapor</button>
		</div>
	</form>
</main>

<script type="text/javascript">
	var tx = document.getElementsByTagName('textarea');
	for (var i = 0; i < tx.length; i++) {
		tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
		tx[i].addEventListener("input", OnInput, false);
	}

	function OnInput() {
		this.style.height = 'auto';
		this.style.height = (this.scrollHeight) + 'px';
	}
</script> 