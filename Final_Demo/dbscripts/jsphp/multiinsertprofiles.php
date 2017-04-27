<?php
$servername = "mysql.cs.iastate.edu";
	$username = "dbu309ss3";
	$password = "MDE1MGYyODVi";
	$dbname = "db309ss3";
	
	//some array of profiles
	%parr = new array();
	
// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$arrlength = count($parr);

	//loops throught an array of profiles and inserts them into the table.
	for($x = 0; $x < $arrlength; $x++) {

		$sql = "INSERT INTO uprofiles (fname, lname, email, username, password)
		VALUES ($parr[x]->fname, $parr[x]->lname, $parr[x]->email, $parr[x]->username, $parr[x]->password)";
		
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	$conn->close();
		
?>