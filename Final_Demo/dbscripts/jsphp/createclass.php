<html>
<body>

<?php 
 //create a class
include_once "createclass.html";
//$q = $_POST["q"];

//$jsonobj = json_decode($q);

$servername = "mysql.cs.iastate.edu";
$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbname = "db309ss3";

$name = $_GET["classname"];
$prnm = $_GET["profname"];
$nstd = $_GET["numberstd"];

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
	$sql = "INSERT INTO classes (id,classname,professor,numstud,filepath) "
	."VALUES (0, '$name', '$prnm', '$nstd', 'test')";
	
	$result = $conn->query($sql);
	$response = "";
	
	if($result){
		$response=  json_encode(mysqli_fetch_row($conn->query("SELECT * from classes ORDER BY id DESC")));
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