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

$exam = $_POST['exam'];
$homework = $_POST['homework'];
$quiz = $_POST['quiz'];
$participation = $_POST['participation'];
$grade = $_POST['grade'];
$id = 0;
$cassid = 0;
$stdid = 0;

$h = "homework";
$p = "participation";
$q = "quiz";
$e = "exam";
$message = "You need to.. ";
$ms = array($h,$p,$q,$e);

//This just tells you what areas you need to focus on to get a desired grade.
if((int)$grade <= 50)
{
	echo "Don't even try. ";
}
else if((int)$grade >= 100)
{
	echo "You have to be perfect. ";
	
}
else
{
	$calc = (int) $grade;
	$info = array((int)$homework,(int)$participation,(int)$quiz,(int)$exam);
	$i = 0;
	
	while((int)$calc>0 and $i<count($info))
	{
		$calc -= $info[$i];
		$i = $i + 1;
		//echo $calc . "<br>";
		
		if($calc<0)
		{
			$info[$i-1] += $calc;
		}
		
		$message .= "," . $ms[$i-1] .  " "  . $info[$i-1];
		
	}
	
}

//mysql_query("INSERT INTO sgf VALUES('$id','$cassid','$stdid','$exam','$quiz','$participation','$grade','$homework') ");

if($conn->query("INSERT INTO sgf VALUES('$id','$cassid','$stdid','$exam','$quiz','$participation','$grade','$homework') "))
	echo "It worked! Now do this, " . $message;
else
	echo "Epic fail";

//failed attempt at connecting to database
	/*if(!isset($error) || $error == null){
		
		$sql = "INSERT INTO sgf 
						SET id = '".mysqli_real_escape_string($conn, get_value(''))."',
							cassid = '".mysqli_real_escape_string($conn, get_value(''))."',
							stdid = '".mysqli_real_escape_string($conn, get_value(''))."',
							exam = '".mysqli_real_escape_string($conn, get_value('exam'))."',
							quiz = '".mysqli_real_escape_string($conn, get_value('quiz'))."',
							particpiation = '".mysqli_real_escape_string($conn, get_value('participation'))."',
							desiredgrade = '".mysqli_real_escape_string($conn, get_value('grade'))."'";
							
		$result = $conn->query($sql);					
		$action = 'welcome';
	}*/
	


	
	
$conn->close();



	
?>