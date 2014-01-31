<?php
	$link = new mysqli("localhost","root","iamtheone","ProNote");
	if($link->connect_errno){
		die("Could not connect to the server.");
	}
?>