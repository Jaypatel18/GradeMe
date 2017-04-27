<?php
$servername = "mysql.cs.iastate.edu";
$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbname = "db309ss3";

$conn = new mysqli($servername, $username, $password, $dbname);

session_start();

//if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	
	$usernm =  $_GET['username'];
	$pass = $_GET['password'];

	$sql = "SELECT id FROM uprofiles WHERE username='$usernm' AND password='$pass'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	//$active = $row['active'];

	$count = mysqli_num_rows($result);

	//if there is a match found there must be 1 row
	$error = "";
	
	if($count == 1){
		session_register("usernm");
		$_SESSION['login_usr'] = $usernm;
		
		header("location: welcome.php");
	}else {
		$error = "That doesn't seem right! Your Username or Password not found!";
		echo error; 
	}

//}
?>


