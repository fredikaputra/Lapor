<header>
	<h1>Pengaturan</h1>
</header>
<main>
	<h2>Informasi Pribadi</h2>
	<span>Informasi dasar anda seperti nama dan foto.</span>
	<div>
		<a href="<?= BASEURL ?>/pengaturan">
			<img src="<?= BASEURL ?>/assets/img/icon/left-arrow.png" alt="">
		</a>
		<h3>Username</h3>
		
		<form action="<?= BASEURL ?>/pengaturan/proccess/username" method="post">
			<input type="text" id="input" value="<?= $data['username'] ?>" onkeyup="checkValueChange()" name="username">
			<button type="submit" name="update" id="save" style="color: lightgray;" disabled>Simpan</button>
		</form>
	</div>
</main>

<script type="text/javascript">
function checkValueChange(){
	var defaultVal = document.querySelector('#input').defaultValue;
	var curentVal = document.querySelector('#input').value;
	var button = document.querySelector('#save');
	
	// check if value is change
	if (defaultVal == curentVal) {
		button.setAttribute('disabled', '',);
		button.setAttribute('style', 'color: lightgray;');
	}else {
		button.removeAttribute('disabled', '',);
		button.setAttribute('style', 'color: dimgray;');
	}
}
</script>