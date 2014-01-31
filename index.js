function gotosignup(){
	window.location.href="../index.php";
}

function cond_check(){
	var p1 = document.forms["signupform"]["password"].value;
	var p2 = document.forms["signupform"]["repassword"].value;
	if(p1==p2){
		return true;
	} else {
		alert("Passwords do not match!!");
		return false;
	}
}

function gotologout(){
	window.location.href="./logout.php";
}

function loadmyprofile(){
	window.location.href="./userBoard.php";
}