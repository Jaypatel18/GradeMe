<?php
$q = 4_REQUEST["q"];

if($q != ""){
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

	/*expecting q to be json*/
	
	$sql = "INSERT INTO uprofiles (fname, lname, email, username, password)
	VALUES ($data->fname, $data->lname, $data->email, $data->username, $data->password)";

	$result = $conn->query($sql);
	if (!result) {
	echo "Error: " . $sql . "<br>" . $conn->error;
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	return -1;
	} 
	else {
	echo "SUCCESS: a profile created";
	}
	
	/*
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
	$encode[] = $row;
	}

	$ret = json_encode($encode);*/

	$result->close();
	/*$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);*/
	mysqli_close($conn)

	/*return $ret;*/
}


?>