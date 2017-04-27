

<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$db_host = "mysql.cs.iastate.edu";
$db_user = "dbu309ss3";
$db_passwd = "MDE1MGYyODVi";
$db_name = "db309ss3";

$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
if(mysqli_connect_errno($conn)) {
	echo "Failed to connect with db:" . mysqli_connect_error();
} else{
	echo "\n\n\n success!\n\n\n"; 

	// Load data from class table.
	//$result = mysqli_query($conn, "select * from classes");
	$sql = "select * from classes";
	//$result = $conn->query($sql);
	$result = mysqli_query($conn, $sql);
	// load one column from result.
	

$row = mysqli_fetch_row($result);

print json_encode($row);


printf("\n\n Select returned %d rows.\n", $result->num_rows);

echo json_encode(mysqli_fetch_row((mysqli_query($conn, $sql), 0)));

echo "here\n";


}


mysqli_close($conn)
?>