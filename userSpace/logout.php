<?php

	session_start();

	if(isset($_SESSION['userid'])){
		unset($_SESSION['userid']);	
	}
	session_destroy();
	header("Location:../index.php");
	exit();

?>