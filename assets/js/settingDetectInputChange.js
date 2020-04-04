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