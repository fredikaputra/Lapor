var laporanWrap = document.getElementsByTagName('textarea');

for (var i = 0; i < laporanWrap.length; i++) {
	laporanWrap[i].setAttribute('style', 'height:' + (laporanWrap[i].scrollHeight) + 'px; overflow-y: hidden;');
	laporanWrap[i].addEventListener('input', OnInput, false);
}

function OnInput(){
	this.style.height = 'auto';
	this.style.height = (this.scrollHeight) + 'px';
}