<?php
$db_host = "mysql.cs.iastate.edu";
$db_user = "db309ss3";
$db_passwd = "MDE1MGYyODVi";

$conn = mysqli_connect($db_host,$db_user,$db_passwd);
if(mysqli_connect_errno($conn)) {
	echo "Failde to connect with db:" . mysqli_connect_error();
} else{
	echo "success!"
}


?>