	<div class="content">
		<div class="header">
			<div>
				<h1>Pengaturan</h1>
				<span>Ubah pengaturan profil anda.</span>
			</div>
		</div>
		
		<form method="post" action="<?= BASEURL ?>/dashboard/pengaturan/proses">
			<h3>Password Sekarang</h3>
			<input type="password" id="input" placeholder="Kata sandi saat ini" onkeyup="checkValueChange()" name="curentPass" required>
			
			<h3>Password Baru</h3>
			<input type="password" id="input" placeholder="Buat kata sandi baru" onkeyup="checkValueChange()" name="newPass" required>
			<input type="password" id="input" placeholder="Konfirmasi kata sandi baru" onkeyup="checkValueChange()" name="confirmPass" required>
			
			<button type="submit" name="updatePassword" id="save">UBAH PASSWORD</button>
		</form>
	</div>
</main>
<script type="text/javascript">
function checkValueChange(){
	var input_form = document.querySelectorAll('.inputchange');
	
	for (var i = 0; i < input_form.length; i++) {
		if (input_form[i].defaultValue == input_form[i].value) {
			input_form[i].setAttribute('disabled', '');
		}
	}
}
</script>