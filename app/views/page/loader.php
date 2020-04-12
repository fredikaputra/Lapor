<div id="loader">
	<div>
		<img src="<?= BASEURL ?>/assets/img/icon/dark-setting.png">
		<span>Dalam Proses...</span>
	</div>
</div>

<script type="text/javascript">
	window.addEventListener("load", function(){
		document.querySelector("#loader").classList.add('hide');
	});
</script>