<main>
	<h1>Sampaikan Aspirasi Anda</h1>
	<span>Laporan anda akan diverifikasi dan diteruskan kepada instansi berwenang</span>
	
	<form method="post" action="<?= BASEURL ?>/formulir-pengaduan/proses" enctype="multipart/form-data" title="<?= (!isset($_SESSION['masyarakatNIK'])) ? 'Silahkan login terlebih dahulu untuk melapor!' : '' ?>">
		<textarea name="msg" placeholder="Ketik laporan anda..." <?= (isset($_SESSION['masyarakatNIK'])) ? '' : 'disabled' ?> required autofocus><?= (isset($_SESSION['msg'])) ? $_SESSION['msg'] : '' ?></textarea>
		<label <?= (isset($_SESSION['masyarakatNIK'])) ? '' : 'disabled' ?>><img src="<?= BASEURL ?>/assets/img/icon/upload.png">Upload
			<input name="photo" type="file" <?= (isset($_SESSION['masyarakatNIK'])) ? '' : 'disabled' ?> accept=".png, .jpg, .jpeg">
		</label>
		<button type="submit" name="report" onclick="unsetload()" <?= (isset($_SESSION['masyarakatNIK'])) ? '' : 'disabled' ?>>LAPORKAN!</button>
	</form>
</main>

<?php

if (isset($_SESSION['msg'])) {
	unset($_SESSION['msg']);
}

?>