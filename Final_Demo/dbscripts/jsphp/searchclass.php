<html>
<body>

<?php 
 //create a class
include_once "searchclass.html";
//$q = $_POST["q"];

//$jsonobj = json_decode($q);

$servername = "mysql.cs.iastate.edu";
$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbname = "db309ss3";

$name = $_GET["classname"];


//echo $_GET["classname"];
/*.mysqli_real_escape_string($conn,$jsonobj->{'classname'}).","
	.mysqli_real_escape_string($conn, $jsonobj->{'professorname'}).","
	.mysqli_real_escape_string($conn, $jsonobj->{'numberstd'})*/
//.mysqli_real_escape_string($conn, get_value('name'))
// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$response = "";
	
	if($result){
		$response=  json_encode(mysqli_fetch_row($conn->query("SELECT * from classes WHERE classname='$name'")));
		/*$encode = array();
		$ret = $conn->query("SELECT * from classes")
		while($row = mysqli_fetch_assoc($ret)){
			$encode[] = $row;
		}
		$response = json_encode($encode);*/
	} 
	else
	{
		$response= "FAIL!";
	}
	
	$conn->close(); 
?>



Here is query to the database or a fail response <?php echo $response ?><br>

</body>
</html>