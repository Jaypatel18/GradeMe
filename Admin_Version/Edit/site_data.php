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

$uData = "SELECT user_id FROM users";
$uRows = mysqli_query($conn,$uData);

$numOfUsers = 0;
//remove echo of ids
//main purpose is to count users for website data
if (mysqli_num_rows($uRows) > 0) {
    
    while($get = mysqli_fetch_assoc($uRows)) {
        //echo "Id " . $get["user_id"] ."<br>";
		$numOfUsers++;
    }
} 

//echo $numOfUsers;



$pData = "SELECT FirstName FROM RateMyProfessor";
$pRows = mysqli_query($conn,$pData);

$numOfProf = 0;
//remove echo of ids
//main purpose is to count profs for website data
if (mysqli_num_rows($pRows) > 0) {
    
    while($get = mysqli_fetch_assoc($pRows)) {
        //echo "Id " . $get["FirstName"] ."<br>";
		$numOfProf++;
    }
} 

//echo $numOfProf;

//$cData = "SELECT timestamp FROM analytics ORDER BY id DESC LIMIT 1;";
//$cRows = mysqli_query($conn,$pData);
//$count = mysqli_fetch_assoc($cRows);

	$count = 1;

//store the number in database

$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>
				GradeMe Data
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h2>
				Number of Users
			</h2>
			<p>
				<?php echo $numOfUsers; ?>
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		<div class="col-md-4">
			<h2>
				Number of Professors
			</h2>
			<p>
				<?php echo $numOfProf; ?>
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		<div class="col-md-4">
			<h2>
				Number of Visits
			</h2>
			<p>
				<?php echo $count; ?>
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>