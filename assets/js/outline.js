document.body.addEventListener('mousedown', function(){
	document.body.classList.add('using-mouse');
});

document.body.addEventListener('keydown', function(event){
	if (event.keyCode === 9) {
		document.body.classList.remove('using-mouse');
	}
});

document.body.addEventListener('keydown', function(event){
	if (event.keyCode === 27) {
		document.activeElement.blur();
	}
});