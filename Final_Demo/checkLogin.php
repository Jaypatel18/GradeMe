<?php
session_start();

$return = array(
	"status"=>false,
	"error"=>'none',
);

$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbServer = "mysql.cs.iastate.edu";
$dbName = "db309ss3";

$conn = new mysqli($dbServer,$username,$password,$dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$username = $request->username;
$password = $request->password;

$sql = "SELECT userName, Password, user_id FROM users";
$result = $conn->query($sql);

if ($conn->query($sql) !== TRUE) {
	$return["error"] = "Error: " . $sql . "<br>" . $conn->error;
}

//if there are users, parse through to check if username is present
if($result->num_rows > 0){

	while($row = $result->fetch_assoc()){
		if( (strcmp($row["userName"],$username) == 0) && (strcmp($row["Password"],$password) == 0) ){
			$return["status"] = true;
			$_SESSION['userID'] = $row['user_id'];
		}

	}
}

//return the JSON object of the php array $return
echo json_encode($return);

?>