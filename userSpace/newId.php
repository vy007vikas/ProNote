<?php

	session_start();

	if(isset($_SESSION['userid'])){
		header('Location:./userSpace/userBoard.php');
	}

	include('../config.inc');

	//array to be returned
	$resultarr = array();

	$newuserUserID = $_POST['userid'];
	$newuserName = $_POST['name'];
	$newuserEmail = $_POST['email'];
	$newuserPassword = $_POST['password'];
	//calculate sha1 hash of the password
	$newuserPasswordHASH = sha1($newuserPassword);
	
	//Checking for similar usernames
	$similarCheck = $link->prepare("SELECT * FROM userdata WHERE userid=:varuserid");
	$similarCheck->bindParam(':varuserid',$newuserUserID);
	if($similarCheck->execute()){
		if($similarCheck->rowCount()==0){
			//If any other user is not found
			//Inserting the userdata in the database
			$result = $link->prepare("INSERT INTO userdata (userid,name,email,password) VALUES (:userid,:name,:email,:passwordHash)");
			$result->bindParam(':userid',$newuserUserID);
			$result->bindParam(':name',$newuserName);
			$result->bindParam(':email',$newuserEmail);
			$result->bindParam(':passwordHash',$newuserPasswordHASH);
			if($result->execute()){
				//If data is successfully inserted in the database
				array_push($resultarr, 2);
				array_push($resultarr, "You have been successfully registered." . "<br>" . "Please login to continue.");
			}
		} else {
			//If another user with similar userid exists
			array_push($resultarr, 1);
			array_push($resultarr, "User ID already exists" . "<br>" . "Choose another one.");
		}
	} else {
		//Error while accessing the database
		array_push($resultarr, '0');
		array_push($resultarr, "Some error occured." . "<br>" . " Please try again.");
	}

	echo json_encode($resultarr);
?>