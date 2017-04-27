<?php
session_start();

$servername = "mysql.cs.iastate.edu";
$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbname = "db309ss3";

$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$error = ''; //error message for me to send out later

if (empty($_POST['username'])) {
$error = "Username is empty";
}
else
{
// Define $username and $password
$username= $_POST['username'];


$sql = "SELECT id from uprofiles WHERE username= '$username'";

$result = $conn->query($sql);
$rows= $result->fetch_assoc();

$id = $rows["id"];	//this grabs the userid based on the username inputed

if (isset($_SESSION['userid'])) {
	$id = $_SESSION['userid'];
	$error = "User tried to acess another user's information";
}else{
	$error = "User is not logged in";
}

$sql = "SELECT classid from utoclass WHERE userid='$id'";
$result2 = $conn->query($sql);
$table= $result2->fetch_array(MYSQLI_BOTH);

foreach($table as &$value){
	$sql2 = "SELECT classname from classes WHERE classid='$value' LIMIT 1";
	$r = $conn->query($sql2);
	$ret = $r->fetch_assoc();
	printf('%s \n', $ret['classid']);
}


?>