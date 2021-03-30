function check_pass() {
	var password=document.getElementById('InputPassword1');
	var password2=document.getElementById('InputPassword2');

	if (password.value.length <6 ){
		window.alert("Password length is less than 6.");
		return false;
	}
	else{
		if (password.value == password2.value) {
	        return true;
	    } else {
	    	window.alert("Passwords don't match.");
	        return false;
	    }
	}
    
}

function check_comm() {
	var checkBox = document.getElementById("myCheck");
	  if (checkBox.checked == true){
	    document.getElementById("ReviewerName").readOnly = false;
	  } else {
	    document.getElementById("ReviewerName").readOnly = true;
	  }
    
}