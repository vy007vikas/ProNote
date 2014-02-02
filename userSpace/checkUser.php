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

				//Storing username and password hash
				$userid = $_POST['userid'];
				$passwordHash = sha1($_POST['password']);

				include('../config.inc');
				//Checking for the user info
				$result = $link->prepare("SELECT * FROM userdata WHERE userid=:userid AND password=:passwordHash");
				$result->bindParam(':userid',$userid);
				$result->bindParam(':passwordHash',$passwordHash);
				if($result->execute()){
					if($result->rowCount()==1){
						//if any such user exists
						$_SESSION['userid'] = $_POST['userid'];
						header("Location:./userBoard.php");
					} else {
						//Incorrect info provided
						echo "Wrong user ID or password. Please login again to continue.<br>";
					}
				}

			?>
			<button class="pure-button pure-button-primary" style="margin:20px;" onclick="gotosignup()">LOG IN</button>
		</div>
		<div class="bottombar">
			&copy; SDSLABS
		</div>
	</body>
</html>