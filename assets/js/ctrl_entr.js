document.getElementById('txt').addEventListener('keydown', function(event){
	if (event.ctrlKey && event.keyCode === 13) {
		document.getElementById('form').submit();
	}
});