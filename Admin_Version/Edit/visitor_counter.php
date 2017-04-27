<?php
//include in homepage
$servername = "mysql.cs.iastate.edu";
$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbname = "db309ss3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 


//will test the vistor counter by itself and then determine if I want to keep it seperate
session_start();

$count = 0;
if(!isset($_SESSION['hasVisited']))
{
	$_SESSION['hasVisited'] = "visited";
	$count++;
}

if($conn->query("INSERT INTO analytics (timestamp) VALUES('$count') "))
	echo $count;
//store the number in database

$conn->close();

?>