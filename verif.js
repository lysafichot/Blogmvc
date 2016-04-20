document.addEventListener('DOMContentLoaded', function() {
	var form = document.getElementById("sign");
	function verifPass(e) {
		e.preventDefault();
		var pass = document.getElementById("password").value;
		var pass_confirm = document.getElementById("password_confirm").value;
		var error_pass = document.getElementById("error_pass");
		if (pass != pass_confirm) {
			error_pass.innerHTML = "Error, the two password is differents ! Please try again.";
		} else {
			form.submit();
		}
	}
	form.addEventListener('submit', verifPass);

});
