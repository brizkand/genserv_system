<?php
	$server = "localhost";
	$root_username="brizkand";
	$root_password="bevinishel05";
	$dbname="genservp_portal";
	//create connection
	$conn = new mysqli($server, $root_username, $root_password, $dbname);
	// check connection
	if($conn->connect_error){
		die("Connection failed " . $conn->connect_error);
	}
	//echo("Connected successfully");
?>


