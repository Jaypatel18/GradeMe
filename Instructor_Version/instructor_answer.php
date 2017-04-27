<?php

$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbServer = "mysql.cs.iastate.edu";
$dbName = "db309ss3";

$conn = new mysqli($dbServer,$username,$password,$dbName);
$action = get_value('action');

if($action == 'data'){
	
	$required = array();
	$required[] = 'answer';
	
	foreach($required as $require){
		
		$val = processText(get_value($require));
		
		if($val == null){
			$error = 'Missing one or more required fields';
		}// end if
		
	}// end foreach
	
	$answer = get_value('answer');
	$question_id = get_value('question_id');
	
	if(!isset($error) || $error == null){
		$sql = "UPDATE QA SET answer = '$answer' WHERE id = '$question_id'";
		$conn->query($sql);
		$action = null;
	}// end if no error
	
}// end if submitted the form

if($action == null){
	$sql = "SELECT id, GROUP_CONCAT(question) AS questions, GROUP_CONCAT(IFNULL(answer, '&nbsp;')) AS answers, classNumber FROM QA GROUP BY classNumber ORDER BY created DESC";
	$result = $conn->query($sql);
	
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<?= isset($error) ? $error : '' ?>
<div class="row">
	<div class="col-md-12">
		<h3>
			Q &amp; A
		</h3>
		
<?php
	while($row = mysqli_fetch_assoc($result)){
		$question_counter = 1;
		$questions = explode(',', $row['questions']);
		$answers = explode(',', $row['answers']);
?>		
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
				<?= $row['classNumber'] ?>
			</h3>
		</div>
	</div>	
<?php		
		foreach($questions as $key => $question){
?>			
	<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
	<input type="hidden" name="action" value="data">
	<input type="hidden" name="question_id" value="<?= $row['id'] ?>">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					Question <?= $question_counter ?>
				</h3>
			</div>
			<div class="panel-body">
				<?= $question ?>
			</div>
			<div class="panel-footer">
				<input type="text" name="answer" value="<?= $answers[$key] ?>">
				<input type="submit">
			</div>
		</div>
	</form>	
<?php		
			$question_counter++;
		}// end foreach question
?>		<br/><br/>		
	</div>	
</div>
<?php
		
	}// end while loop
	
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