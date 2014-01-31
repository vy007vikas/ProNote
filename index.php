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
		<script src="./jquery.parallax-1.1.3.js"></script>
		<script src="./jquery.localscroll-1.2.7-min.js"></script>
		<script src="./jquery.scrollTo-1.4.2-min.js"></script>
	</head>
	<body>
	<div class="fullbody">
		<div class="header">
			<span class="heading">ProNote</span>
			<h3>Make better notes easier and faster</h3>
		</div>
		<div class="content">
			<div class="signupform">
				<form name="signupform" class="pure-form pure-form-stacked" method="post" action="./userSpace/newId.php" onsubmit="return cond_check()">
					<legend><b>Sign Up</b></legend>
					<input type="text" name="name" placeholder="Name" required>
					<input type="text" name="email" placeholder="E-Mail" required>
					<input type="password" name="password" placeholder="Password" required>
					<input type="password" name="repassword" placeholder="Re-enter Password" required>
					<button class="pure-button pure-button-primary" type="submit">SIGN UP</button>
				</form>
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
		</div>
		<div class="bottombar">
			&copy; SDSLABS
		</div>
		</div>
	</body>
</html>