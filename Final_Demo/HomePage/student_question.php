<?php

$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbServer = "mysql.cs.iastate.edu";
$dbName = "db309ss3";

$conn = new mysqli($dbServer,$username,$password,$dbName);

$action = get_value('action');
if($action == 'data'){
	
	$required = array();
	$required[] = 'question';
	$required[] = 'class_number';
	
	foreach($required as $require){
		
		$val = processText(get_value($require));
		
		if($val == null){
			$error = 'Missing one or more required fields';
		}// end if
		
	}// end foreach
	
	$class_number = get_value('class_number');
	$question = get_value('question');
	
	if(!isset($error) || $error == null){
		$sql = "INSERT INTO QA SET classNumber = '$class_number', question = '".mysqli_real_escape_string($conn, $question)."'";
		$conn->query($sql);
		$action = null;
	}// end if no error
	
}// end if submitted the form

?>
<div class="panel-group" id="panel-412284">
<?= isset($error) ? $error : '' ?>
	<div class="panel panel-default">
		<div id="panel-element-884884" class="panel-collapse collapse in">
			<div class="panel-body">
				<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>?action=data">
					<label for="class_number">Class Number:</label>
					<input type="text" name="class_number"><br/><br/>
					<label for="question">Question:</label>
					<textarea name="question" rows="4"></textarea>
					<input type="submit">
				</form>
			</div>
		</div>
	</div>
</div>

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

function processText($text) {
    $text = strip_tags($text);
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}
?>