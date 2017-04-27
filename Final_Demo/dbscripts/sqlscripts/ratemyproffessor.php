<?php

	$q = $_REQUEST["q"];
	$qarr = JSON.parse(q);
	
	$val1 = $qarr.fname;
	$val2 = $qarr.lname;
	$rating = $qarr.rating;
	
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
	$sql = "SELECT * FROM prof WHERE lname=$val1 and fname=$val2 ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		$sql2 = "INSERT INTO prof (userid, rating, numrating, lname, fname) VALUES (34, $rating, 1, "Jim", "Bob")";
		$res1 = $conn->query($sql2);
		echo "3";
	} 
	else {
		$row = mysqli_fetch_row($result);
		$usrid = row[0];
		$rat = row[1];
		$numrat = row[2];
		$newrat = ($rat*$numrat + $rating)/ (numrating +1);
		$sql3 = "UPDATE prof SET rating=$newrat WHERE userid=$usrid";
		$res2 = $conn->query($sql3);
		echo $newrat;
	}
	
	/*
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ ret;*/
	$conn->close();

?>