window.onbeforeunload = function(){
	return true;
}
function setNullLoad(){
	window.onbeforeunload = null;
}