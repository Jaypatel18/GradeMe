<?php

$servername = "mysql.cs.iastate.edu";
$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbname = "db309ss3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$ajax_action = get_value('ajax_action');

if($ajax_action == 'search'){
	$search_string = get_value('search_string');
	
	$sql = "SELECT 
				RatingID, FirstName, LastName, ROUND(AVG(Rating), 2) AS AvgRating, ClassNumber 
				FROM RateMyProfessor 
				WHERE CONCAT(FirstName, ' ', LastName) LIKE '%".mysqli_real_escape_string($conn, $search_string)."%' 
				GROUP BY CONCAT(FirstName, ' ', LastName), ClassNumber";
	
	$result = $conn->query($sql);

	if(!$result){
		exit;
	}
	
	while($row = mysqli_fetch_assoc($result)){
?>	
<table width="30%">
	<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Rating</td>
		<td>Class Number</td>
	</tr>	
	<tr>
		<td><?= $row['FirstName'] ?></td>
		<td><?= $row['LastName'] ?></td>
		<td><?= $row['AvgRating'] ?></td>
		<td><?= $row['ClassNumber'] ?></td>
		<td><a href="search.php?action=edit&id=<?= $row['RatingID'] ?>">Edit</a></td>
		<td><a href="search.php?action=delete&id=<?= $row['RatingID'] ?>">Delete</a></td>
	</tr>
</table>	
<?php		
	}// end while	
		
	exit;
}// end ajax

include_once "navigation.html";


$id = get_value('id');
$action = get_value('action');

if($action == 'delete'){
	// action is delete
	
	if(get_value('conf') != null){
		
		$sql = "DELETE FROM RateMyProfessor WHERE RatingID = '".mysqli_real_escape_string($conn, $id)."'";				
		$result = $conn->query($sql);
		$action = null;
	}
	
	if($action == 'delete'){
?>
	<p>Are you sure you would like to delete this fucking rating?</p>
	<a href="search.php?action=delete&id=<?= $id ?>&conf=true">Yes</a>
	<a href="search.php">No</a>
<?php
	}// end if action is delete
	
}else if($action == 'edit'){
	// action is edit
	if(get_value('data') != null){
	
		$rating = get_value('Rating');
		
		if( $rating < 1 || $rating > 5) {
			$error = '<span style="color:red;text-align:center;">Rating must be between 1-5!</span>';
		}
		
		if(!isset($error) || $error == null){
			$sql = "UPDATE RateMyProfessor SET Rating = '".mysqli_real_escape_string($conn, $rating)."' WHERE RatingID = '".mysqli_real_escape_string($conn, $id)."'";				
			$result = $conn->query($sql);
			$action = null;
		}
	
	}// end if
	
	if($action == 'edit'){
	
	$sql = "SELECT * FROM RateMyProfessor WHERE RatingID = '".mysqli_real_escape_string($conn, $id)."' LIMIT 1";

	$result = $conn->query($sql);

	$row = mysqli_fetch_assoc($result);

	if(isset($error) && $error != null){
		echo $error . "<br><br>";
	}

?>
<form method="post" action="search.php?action=edit&id=<?= $id ?>&data=true">
<table width="30%">
	<tr>
		<td>Rating</td>
	</tr>	
	<tr>
		<td><input type="text" value="<?= get_value('Rating') != null ? get_value('Rating') : $row['Rating'] ?>" name="Rating"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><input type="submit" value="Submit" name="submit"></td>
	</tr>
</table>

</form>
<?php
	}// end if action is edit
}// end if action is edit


if($action == null){
	
// search form
?>
<form>
	<label>First Name:</label>
	<input id="first_name" type="text" name="first_name" value="<?= get_value('first_name') ?>">
</form>

<div id="table"></div>
<?php
?>
<script>
$('#first_name').keyup(function(e) {
	$.post( "search.php", { ajax_action: 'search', search_string: $('#first_name').val() })
		.done(function( data ) {
			$('#table').html(data);
		});
	});
</script>
<?php
}// end if null action
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