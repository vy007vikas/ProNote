<?php
	try{
		$username = "root";
		$password = "iamtheone";
		$link = new PDO('mysql:host=localhost;dbname=ProNote',$username,$password);
		$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $er){
		echo "AN ERROR OCCURED:  " . $er->getMessage();
	}
?>