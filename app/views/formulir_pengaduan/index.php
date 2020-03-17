<main>
	<div>
		<h1>Sampaikan Aspirasi Anda</h1>
		<span>Laporan anda akan diverifikasi dan diteruskan kepada instansi berwenang</span>
		<form action="<?= BASEURL ?>/formulir-pengaduan/proccess" method="post" enctype="multipart/form-data">
			<textarea name="msg" placeholder="Ketik laporan anda..." oninvalid="setCustomValidity('Ketik laporan anda!')" oninput="setCustomValidity('')" required <?= (!isset($_SESSION['masyarakatNIK'])) ? 'disabled' : '' ?>><?= (isset($_SESSION['msg'])) ? $_SESSION['msg'] : '' ?></textarea>
			<label style="<?= (!isset($_SESSION['masyarakatNIK'])) ? 'cursor: not-allowed;' : '' ?>"><img src="<?= BASEURL ?>/assets/img/icon/upload.png" alt="">Upload
				<input type="file" name="photo" <?= (!isset($_SESSION['masyarakatNIK'])) ? 'disabled' : '' ?>>
			</label>
			<button type="submit" name="report" <?= (!isset($_SESSION['masyarakatNIK'])) ? 'disabled' : '' ?>>LAPORKAN!</button>
		</form>
	</div>
</main>

<script type="text/javascript">
	
</script>