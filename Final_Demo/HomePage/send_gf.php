<?php

$q = $_REQUEST["q"];

	$servername = "mysql.cs.iastate.edu";
	$username = "dbu309ss3";
	$password = "MDE1MGYyODVi";
	$dbname = "db309ss3";
	$data = json_decode($q);
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	} 
	
	
?>