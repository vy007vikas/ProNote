<?php
	
	include('../config.inc');
	$result = $link->query("insert into userdata(name,email,password) values ('$_POST[name]','$_POST[email]','$_POST[password]')");
	
	function print_user_id(){
		include('../config.inc');
		$result2 = $link->query("select * from userdata where name='$_POST[name]' and email='$_POST[email]'");
		$rows = mysqli_fetch_array($result2);
		echo "Your login id is {$rows['idno']}.<br>";
		echo "You will be required to enter this every time you login.";
	}

?>

<html>
	<head>
		<title>SignUp-ProNote</title>
		<link rel="stylesheet" type="text/css" href="./newId.css">
		<link rel="stylesheet" type="text/css" href="../index.css">
		<link rel="stylesheet" type="text/css" href="../fonts/web-fonts.css">
		<link rel="stylesheet" type="text/css" href="../pure-rollup.css">
		<script src="../index.js"></script>
		<script src="../jquery-1.10.2.min.js"></script>
		<script src="../jquery.parallax-1.1.3.js"></script>
		<script src="../jquery.localscroll-1.2.7-min.js"></script>
		<script src="../jquery.scrollTo-1.4.2-min.js"></script>
	</head>
	<body>
		<div class="header">
			<span class="heading">ProNote</span>
			<h3>Make better notes easier and faster</h3>
		</div>
			<div class="status">
				<h2>Congozz, you have succesfully registered!!!</h2>
				<h3><?php print_user_id() ?></h3>
				<button class="pure-button pure-button-primary" onclick="gotosignup()">LOG IN</button>
			</div>
		<div class="bottombar">
			&copy; SDSLABS
		</div>
	</body>
</html>