<?php
function query_ten_profiles_by_lname($value){
	$servername = "mysql.cs.iastate.edu";
	$username = "dbu309ss3";
	$password = "MDE1MGYyODVi";
	$dbname = "db309ss3";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM uprofiles WHERE lname=$value ORDER BY id DESC LIMIT 10";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: ten most recent profiles selected by last name succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}
?>