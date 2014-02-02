<?php

	session_start();

	if(isset($_SESSION['userid'])){
		header('Location:./userSpace/userBoard.php');
	}

?>

<html>
	<head>
		<title>ProNote</title>
		<link rel="stylesheet" type="text/css" href="./index.css">
		<link rel="stylesheet" type="text/css" href="./fonts/web-fonts.css">
		<link rel="stylesheet" type="text/css" href="./pure-rollup.css">
		<script src="./index.js"></script>
		<script src="./jquery-1.10.2.min.js"></script>
		<script>

		function check_signup(){
			//Null condition is automatically checked by resquired
			//Only condition to be checked is password match
			var varname = document.getElementById('name').value;
			var varuserid = document.getElementById('userid').value;
			var varemail = document.getElementById('email').value;
			var pass1 = document.getElementById('password').value;
			var pass2 = document.getElementById('repassword').value;
			if(pass1==pass2){
				//Password match . Procceed to signup process
				$.ajax({
					url: './userSpace/newId.php',
					type: 'POST',
					data: {
						name: varname,
						userid: varuserid,
						email: varemail,
						password: pass1
					},
					success:function(received){
						$('.message').val('');
						received = JSON.parse(received);
						if(received[0]==2){
							//Successfully registered
							$('#name').val('');
							$('#userid').val('');
							$('#email').val('');
							$('#password').val('');
							$('#repassword').val('');
						} else {
							//In case of an unsuccessful registration
						}
						var str = "<h3>" + received[1] + "</h3>";
						$('.message').append(str);
					}
				});
			} else {
				alert("Passwords do not match!!");
				//empting the password boxes
				$('#password').val('');
				$('#repassword').val('');
			}
		}

		</script>
	</head>
	<body>
	<div class="fullbody">
		<div class="header">
			<span class="heading">ProNote</span>
			<h3>Make better notes easier and faster</h3>
		</div>
		<div class="content">
			<div class="signupform pure-form pure-form-stacked">
				<legend><b>Sign Up</b></legend>
				<input type="text" id="name" placeholder="Name" required>
				<input type="text" id="userid" placeholder="User ID" required>
				<input type="text" id="email" placeholder="E-Mail" required>
				<input type="password" id="password" placeholder="Password" required>
				<input type="password" id="repassword" placeholder="Re-enter Password" required>
				<button class="pure-button pure-button-primary" onclick="check_signup()">SIGN UP</button>
			</div>
			<div class="loginform">
				<form name="loginform" class="pure-form pure-form-stacked" method="post" action="./userSpace/checkUser.php">
					<legend><b>Log In</b></legend>
					<input type="text" name="userid" placeholder="User-ID" required>
					<input type="password" name="password" placeholder="Password" required>
					<button class="pure-button pure-button-primary" type="submit">LOG IN</button>
				</form>
			</div>
			<div class="about">
				<h1>Welcome to ProNote</h1>
				<h3>An app designed to make your life easier. Make notes fastly with ProNote and stay organized.</h3>
			</div>
			<div class="message">
				
			</div>
		</div>
		<div class="bottombar">
			&copy; SDSLABS
		</div>
		</div>
	</body>
</html>