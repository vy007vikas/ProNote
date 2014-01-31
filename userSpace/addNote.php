<?php
	
	session_start();
	if(!(isset($_SESSION['userid']))){
		header("Location:../index.php");
	}

	$arrayvar = array();

	include('../config.inc');
	$heading = $_POST['heading'];
	$data = $_POST['data'];
	$result = $link->query("insert into allNotes(idno,heading,data,done) values ('$_SESSION[userid]','$heading','$data',0)");
	

	$resultshowNotes = $link->query("select * from allNotes where idno='$_SESSION[userid]' and heading='$heading' and data='$data'");
	$resultarray = mysqli_fetch_array($resultshowNotes);
	array_push($arrayvar, $resultarray['heading']);
	array_push($arrayvar, $resultarray['index']);
	array_push($arrayvar, $resultarray['data']);
	echo json_encode($arrayvar);

?>