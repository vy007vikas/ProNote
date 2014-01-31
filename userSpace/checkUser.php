<html>
	<head>
		<title>LogIn-ProNote</title>
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
			<?php
				session_start();

				$noOfRows = checkPass();
				if($noOfRows==1){
					$_SESSION['userid'] = $_POST['userid'];
					header("Location:./userBoard.php");
				} else {
					echo "Wrong user ID or password. Please login again to continue.<br>";
				}

				function checkPass(){
					include('../config.inc');
					$result = $link->query("select * from userdata where password='$_POST[password]' and idno='$_POST[userid]'");
					return mysqli_num_rows($result);
				}

			?>
			<button class="pure-button pure-button-primary" style="margin:20px;" onclick="gotosignup()">LOG IN</button>
		</div>
		<div class="bottombar">
			&copy; SDSLABS
		</div>
	</body>
</html>