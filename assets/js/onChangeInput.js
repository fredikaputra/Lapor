var saveBtn = document.getElementById('saveUserProfile');
var cancelSaveBtn = document.getElementById('cancelSaveUserProfile');

function checkValueChange(){
	var defaultVal1 = document.getElementById('onChange1').defaultValue;
	var curentVal1 = document.getElementById('onChange1').value;
	var defaultVal2 = document.getElementById('onChange2').defaultValue;
	var curentVal2 = document.getElementById('onChange2').value;
	var defaultVal3 = document.getElementById('onChange3').defaultValue;
	var curentVal3 = document.getElementById('onChange3').value;
	// check if value is change
	if (defaultVal1 == curentVal1 && defaultVal2 == curentVal2 && defaultVal3 == curentVal3) {
		saveBtn.classList.add('hide');
		cancelSaveBtn.classList.add('hide');
	}else {
		console.log('asfjlk;d');
		saveBtn.classList.remove('hide');
		cancelSaveBtn.classList.remove('hide');
	}
}

// hide function
function hide(){
	saveBtn.classList.add('hide');
	cancelSaveBtn.classList.add('hide');
}