<?php

$servername = "mysql.cs.iastate.edu";
$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbname = "db309ss3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//will delete users name from database 
function deleteUser($name)
{
	$pData = "DELETE FROM users WHERE ".$name;
	$pRows = mysqli_query($conn,$pData);
}



?>