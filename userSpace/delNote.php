<?php
	
	session_start();
	if(!(isset($_SESSION['userid']))){
		header("Location:../index.php");
	}

	//Storing the index of the note to be deleted in $tbd
	$tbd = $_POST['index'];
	//Deleting code
	include('../config.inc');
	$result = $link->prepare('DELETE FROM allNotes WHERE `index` = :tbd');
	$result->bindParam(':tbd',$tbd);
	$result->execute();

?>