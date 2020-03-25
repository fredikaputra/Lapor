// ketika website digunakan dengan mouse, maka * (link) tidak berisi outline
document.body.addEventListener('mousedown', function(){
	document.body.classList.add('using-mouse');
});

// ketika website digunakan dengan keyboard (TAB), maka * (link) berisi outline
document.body.addEventListener('keydown', function(event){
	if (event.keyCode === 9) {
		document.body.classList.remove('using-mouse');
	}
});

// ketika tombol ESC ditekan, maka * (link) tidak berisi outline
document.body.addEventListener('keydown', function(event){
	if (event.keyCode === 27) {
		document.activeElement.blur();
	}
});