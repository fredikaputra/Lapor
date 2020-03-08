function closemodal(){
	document.getElementById('modal-login').classList.add('hide');
	document.getElementById('modal-signup').classList.add('hide');
}

function showmodallogin(){
	document.getElementById('modal-login').classList.remove('hide');
	window.setTimeout(function (){
		document.getElementById('focus-login').focus();
	}, 100);
}

function showmodalsignup(){
	document.getElementById('modal-signup').classList.remove('hide');
	window.setTimeout(function(){
		document.getElementById('focus-signup').focus();
	}, 100)
}

function openlogin(){
	document.getElementById('modal-login').classList.remove('hide');
	document.getElementById('modal-signup').classList.add('hide');
	window.setTimeout(function(){
		document.getElementById('focus-login').focus();
	}, 100);
}

function opensignup(){
	document.getElementById('modal-login').classList.add('hide');
	document.getElementById('modal-signup').classList.remove('hide');
	window.setTimeout(function(){
		document.getElementById('focus-signup').focus();
	}, 100)
}

window.onclick = function(event){
	if (event.target == document.getElementById('modal-login')) {
		document.getElementById('modal-login').classList.add('hide');
	}else if (event.target == document.getElementById('modal-signup')) {
		document.getElementById('modal-signup').classList.add('hide');
	}
}