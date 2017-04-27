<?php

$servername = "mysql.cs.iastate.edu";
$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbname = "db309ss3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$action = get_value('action');

if($action == 'data'){
	
	$required = array();
	$required[] = 'class_number';
	$required[] = 'announcement';
	
	foreach($required as $require){
		
		$val = processText(get_value($require));
		
		if($val == null){
			$error = 'Missing one or more required fields';
		}// end if
		
	}// end foreach
	
	$class_number = get_value('class_number');
	$announcement = get_value('announcement');
	
	if(!isset($error) || $error == null){
		$sql = "INSERT INTO announcements SET classNumber = '$class_number', announcement = '$announcement'";
		$conn->query($sql);
		$action = null;
	}// end if no error
	
}// end if submitted the form

if($action == null){
	
	$sql = "SELECT classNumber, GROUP_CONCAT(announcement) AS messages FROM announcements GROUP BY classNumber";
	$result = $conn->query($sql);
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HomePage for instructor!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
  	<center>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>
				Announcement
			</h3>
	</div>
	<div class="row">	
			<div class="panel-group" id="panel-412284">
			<?= isset($error) ? $error : '' ?>
				<div class="panel panel-default">
					<div id="panel-element-884884" class="panel-collapse collapse in">
						<div class="panel-body">
							<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>?action=data">
								<label for="class_number">Class Number:</label>
								<input type="text" name="class_number"><br/><br/>
								<label for="announcement">Announcement:</label>
								<textarea name="announcement" rows="4"></textarea>
								<input type="submit">
							</form>
						</div>
					</div>
				</div>
			</div>
<?php			
	while($row = mysqli_fetch_assoc($result)){
		
		$announcements = explode(',', $row['messages']);
	?>
<div class="panel-group" id="panel-412284">
	<div class="panel panel-default">
		<div class="panel-heading">
			 <a class="panel-title" data-toggle="collapse" data-parent="#panel-412284" href="#panel-element-884884">Announcement posted for <?= $row['classNumber'] ?>.</a>
		</div>		
<?php		
		foreach($announcements as $announcement){
?>
<div id="panel-element-884884" class="panel-collapse collapse in">
	<div class="panel-body">
			<?= $announcement ?>
	</div>
</div>
<?php			
		}// end foreach
?>	
	</div>
</div>		
<?php		
	}// end while	
?>					
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3>
				<a href="/Instructor_Version/todo.html" target="_blank">TODO list</a> 
			</h3>

			<h3>
				<a href="/Instructor_Version/instructor_answer.php" target="_blank">Answer student questions</a> 
			</h3>
			
		</div>
	</div>
</div>
</center>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

<?php
}// end if action == null
function get_value($index, $array = null){
	
	if($array == null){
		$array = $_REQUEST;
	}
	
	if(isset($array[$index])){
		return $array[$index];
	}
	return null;
}

function processText($text) {
    $text = strip_tags($text);
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}
?>