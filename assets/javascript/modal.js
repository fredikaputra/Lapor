var signin_modal = document.getElementById('signin-modal');
var signup_modal = document.getElementById('signup-modal');
var signinbtn = document.getElementById('signin');
var signupbtn = document.getElementById('signup');
var signupmodalbtn = document.getElementById('signup-modal-btn');
var siginpmodalbtn = document.getElementById('signin-modal-btn');
var closebtnsignin = document.getElementById('closeSignin');
var closebtnsignup = document.getElementById('closeSignup');

signinbtn.onclick = function(){
	signin_modal.classList.add('show');
	signin_modal.classList.remove('hide');
}

signupbtn.onclick = function(){
	signup_modal.classList.add('show');
	signup_modal.classList.remove('hide');
}

signupmodalbtn.onclick = function(){
	signin_modal.classList.add('hide');
	signin_modal.classList.remove('show');
	signup_modal.classList.add('show');
	signup_modal.classList.remove('hide');
}

siginpmodalbtn.onclick = function(){
	signup_modal.classList.add('hide');
	signup_modal.classList.remove('show');
	signin_modal.classList.add('show');
	signin_modal.classList.remove('hide');
}

closebtnsignin.onclick = function(){
	signin_modal.classList.add('hide');
	signin_modal.classList.remove('show');
}

closebtnsignup.onclick = function(){
	signup_modal.classList.add('hide');
	signup_modal.classList.remove('show');
}

window.onclick = function(event){
	if (event.target == signin_modal) {
		signin_modal.classList.add('hide');
		signin_modal.classList.remove('show');
	}else if (event.target == signup_modal) {
		signup_modal.classList.add('hide');
		signup_modal.classList.remove('show');
	}
}