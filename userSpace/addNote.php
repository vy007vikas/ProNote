<?php
	
	session_start();
	if(!(isset($_SESSION['userid']))){
		header("Location:../index.php");
	}

	include('../config.inc');

	$heading = $_POST['heading'];
	$data = $_POST['data'];

	//Inserting the note in the database
	$result = $link->prepare("INSERT INTO allNotes (userid,heading,data) VALUES (:userid,:heading,:data)");
	$result->bindParam(':userid',$_SESSION['userid']);
	$result->bindParam(':heading',$heading);
	$result->bindParam(':data',$data);
	if($result->execute()){
		//Finding the id of the inserted note
		$result2 = $link->prepare("SELECT * FROM allNotes WHERE userid=:userid AND heading=:heading AND data=:data");
		$result2->bindParam(':userid',$_SESSION['userid']);
		$result2->bindParam(':heading',$heading);
		$result2->bindParam(':data',$data);
		if($result2->execute()){
			$myVar = $result2->fetch(PDO::FETCH_ASSOC);
			echo $myVar['index'];
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}

?>