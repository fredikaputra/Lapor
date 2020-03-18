<main>
	<div>
		<h1>Sampaikan Aspirasi Anda</h1>
		<span>Laporan anda akan diverifikasi dan diteruskan kepada instansi berwenang</span>
		<form action="<?= BASEURL ?>/formulir-pengaduan/proccess" method="post" enctype="multipart/form-data">
			<textarea name="msg" placeholder="Ketik laporan anda..." oninvalid="setCustomValidity('Ketik laporan anda!')" oninput="setCustomValidity('')" required <?= (!isset($_SESSION['masyarakatNIK'])) ? 'style="resize: none !important" disabled title="Silahkan login terlebih dahulu!"' : '' ?>><?= (isset($_SESSION['msg'])) ? $_SESSION['msg'] : '' ?></textarea>
			<label <?= (!isset($_SESSION['masyarakatNIK'])) ? 'style="cursor: not-allowed;" title="Silahkan login terlebih dahulu!"' : '' ?>><img src="<?= BASEURL ?>/assets/img/icon/upload.png" alt="">Upload
				<input type="file" name="photo" <?= (!isset($_SESSION['masyarakatNIK'])) ? 'disabled' : '' ?>>
			</label>
			<button type="submit" name="report" <?= (!isset($_SESSION['masyarakatNIK'])) ? 'disabled title="Silahkan login terlebih dahulu!"' : '' ?> onclick="setNullLoad()">LAPORKAN!</button>
		</form>
	</div>
</main>

<?php

if (isset($_SESSION['msg'])) {
	unset($_SESSION['msg']);
}

?>