<?php

$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbServer = "mysql.cs.iastate.edu";
$dbName = "db309ss3";

$conn = new mysqli($dbServer,$username,$password,$dbName);

$sql = "SELECT classNumber, GROUP_CONCAT(announcement) AS messages FROM announcements GROUP BY classNumber";
$result = $conn->query($sql);	


?>
 <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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