<?php
// Start the session
session_start();
echo "started session <br>";

$servername = "mysql.cs.iastate.edu";
$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbname = "db309ss3";

$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
echo "Got past connections <br>";
$error = ''; //error message for me to send out later

if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username= $_POST['username'];
$password= $_POST['password'];

echo "<br> username: <br>";
echo $username;
echo "<br> password: <br>";
echo $password;

$sql = "SELECT id from uprofiles WHERE username= '$username' AND password='$password'";

$result = $conn->query($sql);
$rows= $result->fetch_assoc();
echo "<br> id: <br>";
echo $rows["id"];
echo "<br>";


if($rows < 1)
{
	$error = "Username or Password is incorrect!";
}
else{
	$_SESSION['userid'] = $rows["id"];
}
}
	
echo "session id: ";
echo $_SESSION['userid'];
echo "<br";

if (isset($_SESSION['userid'])) {
	echo $_SESSION['userid'];
}else{
	echo $error;
}

?>



