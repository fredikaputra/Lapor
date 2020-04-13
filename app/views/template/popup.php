<div class="popup hide">
	<form method="post" id="deleteForm">
		<button type="button" onclick="closeDelPopup()">
			<img src="<?= BASEURL ?>/assets/img/icon/close.png">
		</button>
		<img src="<?= BASEURL ?>/assets/img/icon/bin.png">
		<h2>Apakah anda yakin?</h2>
		<span id="info"></span>
		<strong id="id"></strong>?
		<span>Anda tidak bisa membatalkan tindakan ini.</span>
		<div>
			<button type="button" onclick="closeDelPopup()">Batal</button>
			<button type="submit">Hapus</button>
		</div>
	</div>
</div>