<?php
	
	session_start();
	if(!(isset($_SESSION['userid']))){
		header("Location:../index.php");
	}

	include('../config.inc');
	$tbd = $_POST['index'];
	//Deleting code
	$temp = "DELETE FROM `allNotes` WHERE `index` = $tbd";
	$deleteresult = $link->query($temp);

?>