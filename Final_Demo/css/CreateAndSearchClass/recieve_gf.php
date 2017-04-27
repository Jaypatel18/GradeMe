<?php

$servername = "mysql.cs.iastate.edu";
$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbname = "db309ss3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

//Was not being consistent with my query so I could not get all the info from the database
/*while($rows = $conn->query("SELECT desiredgrade FROM sgf")->fetch_assoc()){
	echo "Your desired grades: " .$rows["desiredgrade"]. ".";
	
}*/

//$allInfo = json_encode(mysqli_fetch_all($conn->query("SELECT * FROM sgf")));

//echo $allInfo;

//This just gets one result
//$rows = $conn->query("SELECT desiredgrade FROM sgf")->fetch_assoc();
//echo "Your desired grades: " .$rows["desiredgrade"]. ".";


$data = "SELECT desiredgrade FROM sgf";
$rows = mysqli_query($conn,$data);

//show all desired grades in the table
if (mysqli_num_rows($rows) > 0) {
    
    while($get = mysqli_fetch_assoc($rows)) {
        echo "The grades you want are " . $get["desiredgrade"] ."<br>";
    }
} 


$conn->close();

?>