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


include_once "navigation.html";

if(get_value('data') != null){
	$required = array('name', 'lastname', 'classnum', 'rating');

	if( get_value('rating') < 1 || get_value('rating') > 5) {
		$error = '<span style="color:red;text-align:center;">Rating must be between 1-5!</span>';
	}

	foreach($required as $require){
		
		if(get_value($require) == null){
			$error = '<span style="color:red;text-align:center;">Missing one or more required fields!</span>';
			// echo '<span style="color:#AFA;text-align:center;">Request has been sent. Please wait for my reply!</span>';
		}
		
	}

	
	if(!isset($error) || $error == null){
		
		$sql = "INSERT INTO RateMyProfessor 
						SET FirstName = '".mysqli_real_escape_string($conn, get_value('name'))."',
							LastName = '".mysqli_real_escape_string($conn, get_value('lastname'))."',
							ClassNumber = '".mysqli_real_escape_string($conn, get_value('classnum'))."',
							Rating = '".mysqli_real_escape_string($conn, get_value('rating'))."'";
							
		$result = $conn->query($sql);					
		$action = 'welcome';
	}
}


?>

<?php
	if(!isset($action) || $action == null){
?>


<form id = "frm" action="index.php" method="post">
<input type="hidden" name="data" value="true">



<center> <font size="6" color = "red" background color="black"> Rate the professor! </font> </center>
<br>
<center> <p> Enter the Professor information that you would like to rate! </p>
First Name: <input type="text" placeholder="Enter first name" name="name" value="<?= get_value('name') ?>"><br> <br>
Last Name: <input type="text" placeholder="Enter last name" name="lastname" value="<?= get_value('lastname') ?>"><br> <br>
Class Number: <input type="text" placeholder="Enter Class #" name="classnum" value="<?= get_value('classnum') ?>"><br> <br>
Rating: <input type="number" placeholder="out of 5" name="rating" value="<?= get_value('rating') ?>"><br> <br><br>

<?php
if(isset($error) && $error != null){
	echo $error . "<br><br>";
}
?>


<input type="submit">
</form>
</center>



<?php
	}
?>

<?php
	if(isset($action) && $action == 'welcome'){
?>

Thank you for rating, <?php echo $_POST["name"]; ?> 
for class, <?php echo $_POST["classnum"]; ?>  <br>
You rated: <?php echo $_POST["rating"]; ?> out of 5<br>


<?php
	}
?>


<?php
	function get_value($index, $array = null){
		
		if($array == null){
			$array = $_REQUEST;
		}
		
		if(isset($array[$index])){
			return $array[$index];
		}
		return null;
	}
?>