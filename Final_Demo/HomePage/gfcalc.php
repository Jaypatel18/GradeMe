<?php

//$page = new DOMDocument();
//$page->loadHTMLFile('grade_form2.html');

$HWpercent = (int) $_POST["hwp"];
$QZpercent = $_POST["qp"];
$EXpercent = $_POST["ep"];
$PJpercent = $_POST["pp"];
$totalPercent = 0;


//Takes an array and sums up the contents
function catTotal($catArr){
	
	$total = 0;
	
	foreach($catArr as $eachInput){
		$total += $eachInput;
	}
	
	return $total;
}

//Takes the user input of the value of the category and subtracts it from the total of all the user entries
function catRemainder ($catTotal, $catArrTotal){
	
	$remainder = 0;
	
	$remainder = $catTotal - $catArrTotal;
	
	return $remainder;
}

//Takes the user input of number of elements going into a category and subtracts it from the number of inputs
function catElements($catElements, $catArr){
	
	$elementsRemaining = 0;
	
	$elementsRemaining = $catElements - count($catArr);
	
	return $elementsRemaining;
}

//returns an array of with assignments and percentage remaining
function catBreakdown($catRemainder, $catElementsRemaining){
	
	$info = array(0,0);
	
	if($catElementsRemaining == 0){
		
		return $info;
		
	}
	else
	{
		$info[0] = $catElementsRemaining;
		$info[1] = $catRemainder;
		
		return $info;
	}
	
}

//returns a total or 0 depending if the total of all categories is equal or greater than the desiredGrade
function goalReached($hwArr, $exArr, $qzArr, $pjArr, $desiredGrade){
	
	$total = catTotal($hwArr) + catTotal($exArr) + catTotal($qzArr) + catTotal($pjArr);
	
	if($total >= $desiredGrade){
		
		return 0;
		
	}
	else{
		
		return $total;
		
	}
	
}

//returns the same thing as catBreakdown but uses the other functions to minimize code being written in main
function catBreakdown2($catArr,$catArrTotal,$catElements)
{
	$remainder = catRemainder($catArrTotal,catTotal($catArr));
	$elements = catElements($catElements,$catArr);
	
	return catBreakdown($remainder,$elements);
	
}

//returns a string of suggested action to achieve the desired grade
function catSuggestionOne($hwBreakdown, $exBreakdown, $qzBreakdown, $pjBreakdown, $desiredGrade, $total)
{
	
	
	if($total == 0){
		
		return "Goal reached!";
		
	}
	
	$left = $desiredGrade - $total;
	
	//$message = "For the remaining " + $left "You will need to ";
	
	if($hwBreakdown[0]>0 && $left > 0){
		
		$left -= $hwBreakdown[1];
		$pPerHW = $hwBreakdown[1]/$hwBreakdown[0];
		
		if($left <= 0){
			
			$perNeeded = $left + $hwBreakdown[1];
			
			echo "For the remaing ". $hwBreakdown[0] ." homeworks you need to get ". $pPerHW ." percent for each or combined <br>";
			
		}
		else
		{
			echo "For the remaing ". $hwBreakdown[0] ." homeworks you need to get ". $pPerHW ." percent for each or combined <br>";
		}
		
	}
	else if($hwBreakdown[0]==0)
	{
		echo "No homeworks left <br>";
	}
	else
	{
		echo "----- <br>";
	}
	
	if($exBreakdown[0]>0&& $left>0){
		
		$left -= $exBreakdown[1];
		$pPerEX = $exBreakdown[1]/$exBreakdown[0];
		
		if($left <= 0){
			
			echo "For the remaining ". $exBreakdown[0] ." exams you need to get ". $pPerEX ." percent for each or combined <br>";
			
		}
		else
		{
			echo "For the remaing ". $exBreakdown[0] ." exams you need to get ". $pPerEX ." percent for each or combined <br>";
		}
		
	}
	else if($exBreakdown[0]==0)
	{
		echo "No exams left <br>";
	}
	else
	{
		echo "----- <br>";
	}
	
	if($qzBreakdown[0]>0 && $left>0){
		
		$left -= $qzBreakdown[1];
		$pPerQZ = $qzBreakdown[1]/$qzBreakdown[0];
		
		if($left <= 0){
			
			echo "For the remaing ". $qzBreakdown[0] ." quizes you need to get ". $pPerQZ ." percent for each or combined <br>";
			
		}
		else
		{
			echo "For the remaing ". $qzBreakdown[0] ." quizes you need to get ". $pPerQZ ." percent for each or combined <br>";
		}
		
	}
	else if($qzBreakdown[0]==0)
	{
		echo "No quizzes left <br>";
	}
	else
	{
		echo "----- <br>";
	}
	
	if($pjBreakdown[0]>0 && $left>0){
		
		$left -= $pjBreakdown[1];
		$pPerPJ = $pjBreakdown[1]/$pjBreakdown[0];
		
		if($left <= 0){
			
			echo "For the remaing ". $pjBreakdown[0] ." projects you need to get ". $pPerPJ ." percent for each or combined <br>";
			
		}
		else
		{
			echo "For the remaing ". $pjBreakdown[0] ." projects you need to get ". $pPerPJ ." percent for each or combined <br>";
		}
		
		
	}
	else if($pjBreakdown[0]==0)
	{
		echo "No projects left <br>";
	}
	else
	{
		echo "----- <br>";
	}
	
	$finalPercent = $_POST["fep"];
	$finalInput = $_POST["Final"];
	if($finalInput == '' && $left>0)
	{
		$left -= $finalPercent;
		if($left <= 0){
			
			$need = $left + $finalPercent;
			
			echo "For the Final you need ". $need ."<br>";
			
		}
		else
		{
			echo "For the Final you need ". $need ."<br>";
		}
	}
	else
	{
		echo "No final exam left <br>";
	}
	
	if($left>0)
	{
		echo "You can't reach your desired grade.";
	}
}

//returns a string of suggested action to achieve the desired grade
function catSuggestionTwo($hwBreakdown, $exBreakdown, $qzBreakdown, $pjBreakdown, $desiredGrade, $total)
{
		if($total == 0){
		
		return "Goal reached!";
		
	}
	
	$left = $desiredGrade - $total;
	
	//$message = "For the remaining " + $left "You will need to ";
	
	if($exBreakdown[0]>0&& $left>0){
		
		$left -= $exBreakdown[1];
		$pPerEX = $exBreakdown[1]/$exBreakdown[0];
		
		if($left <= 0){
			
			echo "For the remaining ". $exBreakdown[0] ." exams you need to get ". $pPerEX ." percent for each or combined<br>";
			
		}
		else
		{
			echo "For the remaining ". $exBreakdown[0] ." exams you need to get ". $pPerEX ." percent for each or combined<br>";
		}
		
	}
	else if($exBreakdown[0]==0)
	{
		echo "No exams left <br>";
	}
	else
	{
		echo "----- <br>";
	}
	
	if($pjBreakdown[0]>0 && $left>0){
		
		$left -= $pjBreakdown[1];
		$pPerPJ = $pjBreakdown[1]/$pjBreakdown[0];
		
		if($left <= 0){
			
			echo "For the remaining  ". $pjBreakdown[0] ." projects you need to get ". $pPerPJ ." percent for each or combined<br>";
			
		}
		else
		{
			echo "For the remaining ". $pjBreakdown[0] ." projects you need to get ". $pPerPJ ." percent for each or combined<br>";
		}
		
		
	}
	else if($pjBreakdown[0]==0)
	{
		echo "No projects left <br>";
	}
	else
	{
		echo "----- <br>";
	}
	
	if($hwBreakdown[0]>0 && $left > 0){
		
		$left -= $hwBreakdown[1];
		$pPerHW = $hwBreakdown[1]/$hwBreakdown[0];
		
		if($left <= 0){
			
			$perNeeded = $left + $hwBreakdown[1];
			
			echo "For the remaining ". $hwBreakdown[0] ." homeworks you need to get ". $pPerHW ." percent for each or combined<br>";
			
		}
		else
		{
			echo "For the remaining ". $hwBreakdown[0] ." homeworks you need to get ". $pPerHW ." percent for each or combined<br>";
		}
		
	}
	else if($hwBreakdown[0]==0)
	{
		echo "No homeworks left <br>";
	}
	else
	{
		echo "----- <br>";
	}
	
	
	if($qzBreakdown[0]>0 && $left>0){
		
		$left -= $qzBreakdown[1];
		$pPerQZ = $qzBreakdown[1]/$qzBreakdown[0];
		
		if($left <= 0){
			
			echo "For the remaining ". $qzBreakdown[0] ." quizes you need to get ". $pPerQZ ." percent for each or combined<br>";
			
		}
		else
		{
			echo "For the remaining ". $qzBreakdown[0] ." quizes you need to get ". $pPerQZ ." percent for each or combined<br>";
		}
		
	}
	else if($qzBreakdown[0]==0)
	{
		echo "No quizzes left <br>";
	}
	else
	{
		echo "----- <br>";
	}

	$finalPercent = $_POST["fep"];
	$finalInput = $_POST["Final"];
	if($finalInput == '' && $left>0)
	{
		$left -= $finalPercent;
		if($left <= 0){
			
			$need = $left + $finalPercent;
			
			echo "For the Final you need ". $need ."<br>";
			
		}
		else
		{
			echo "For the Final you need ". $need ."<br>";
		}
	}
	else
	{
		echo "No final exam left <br>";
	}
	
	if($left>0)
	{
		echo "You can't reach your desired grade.";
	}
}

//writes the content of one of the categories in a file
function writeCat($file, $catArr, $percent, $elements)
{
	fwrite($file,$percent);
	
	fwrite($file,$elements);
	
	foreach($catArr as $eachInput){
		fwrite($file,$eachInput);
	}
	
	
}

//writes everything else in the file
function writeFile($desiredGrade, $class)
{
	$fileName = "";
	$file = fopen($fileName,"w");
	fwrite($file,$class);
	fwrite($file,$desiredGrade);
	
	writeCat();
	
	fclose($file);
}

/*function values(){
	
	//$v = array();
	$d = new DOMDocument();
	$d->loadHTMLFile('gf2.html');
	$page = new DOMXpath($d);
	
	
	$HWInputs = array();
	$HWremainder = 0;
	$HWadvice = "";
	$getHWInputs = $_POST["hwInput"];
	foreach ($getHWInputs as $eachInput) {
		$HWInputs[] = $eachInput;
		$totalPercent += $eachInput;
		$HWpercent -= (int) $eachInput;
		echo $eachInput . "<br>";
	}
	
	if(sizeof($HWInputs) == (int)$_POST["NofHW"])
	{
		
	}
	else
	{
		$HWreamainder = sizeof($HWInputs) == $_POST["NofHW"];
		
	}
	
	
	$EXInputs = array();
	$getEXInputs = $_POST["exInput"];
	foreach ($getEXInputs as $eachInput) {
		$EXInputs[] = $eachInput
		$totalPercent += $eachInput;
		echo $eachInput . "<br>";
	}
	
	$QZInputs = array();
	$getQZInputs = $_POST["qzInput"];
	foreach ($getQZInputs as $eachInput) {
		$QZInputs[] = $eachInput;
		$totalPercent += $eachInput;
		echo $eachInput . "<br>";
	}
	
	$PJInputs = array();
	$getPJInputs = $_POST["pjInput"];
	foreach ($getPJInputs as $eachInput) {
		$PJInputs[] = $eachInput;
		$totalPercent += $eachInput;
		echo $eachInput . "<br>";
	}
	
	if($totalPercent >= (int)$_POST["desiredGrade"])
	{
		echo "You have reached your goal!";
	}
	else if(sizeof($HWInputs)==$_POST["NofHW"]&&sizeof($EXInputs)==$_POST["NofEX"]&&sizeof($QZInputs)==$_POST["NofQZ"]&&sizeof($PJInputs)==$_POST["NofPJ"])
	{
		echo "You can not do anything else";
	}
	else
	{
		$finalSuggestion = "";
		if(sizeof($HWInputs)!=$_POST["NofHW"])
		{
			$finalSuggestion += $HWadvice;
		}
		if(sizeof($EXInputs)!=$_POST["NofEX"])
		{
			
		}
		if(sizeof($QZInputs)!=$_POST["NofQZ"])
		{
			
		}
		if(sizeof($PJInputs)!=$_POST["NofPJ"])
		{
			
		}
	}
	
	$divHW = $page->query('//div[contains(@class, "hw")]');
	foreach($divHW as $h){
		//$v[] = $h->nodeValue;
		echo $h->nodeValue;

	}

	$divExams = $page->query('//div[contains(@class, "ex")]');
	foreach($divExams as $e){
		//$v[] = $e->nodeValue;
		echo $e->nodeValue;

	}

	$divQuiz = $page->query('//div[contains(@class, "qz")]');
	foreach($divQuiz as $q){
		//$v[] = $q->nodeValue;
		echo $q->nodeValue;

	}
	
	$divProjects = $page->query('//div[contains(@class, "qz")]');
	foreach($divProjects as $p){
		//$v[] = $p->nodeValue;
		echo $p->nodeValue;
	}
	
	//return $v;
}*/

$getHWInputs = $_POST["hwInput"];
$getEXInputs = $_POST["exInput"];
$getQZInputs = $_POST["qzInput"];
$getPJInputs = $_POST["pjInput"];

$hwTotal = catTotal($getHWInputs);
$exTotal = catTotal($getEXInputs);
$qzTotal = catTotal($getQZInputs);
$pjTotal = catTotal($getPJInputs);
//echo $hwTotal;
$hwRemainder = catRemainder($HWpercent,$hwTotal);
//echo $hwRemainder;
$hwElements = $_POST["NofHW"];
$exElements = $_POST["NofEX"];
$qzElements = $_POST["NofQZ"];
$pjElements = $_POST["NofPJ"];
$hwElements2 = catElements($hwElements,$getHWInputs);
//echo $hwElements2;
//$hwBreakdown = catBreakdown($hwRemainder,$hwElements2);
//echo $hwBreakdown[0];
//echo $hwBreakdown[1];
$goalLeft = goalReached($getHWInputs,$_POST["exInput"],$_POST["qzInput"],$_POST["pjInput"],$_POST["desiredGrade"]);
//echo $goalLeft;

$hwBreakdown = catBreakdown2($getHWInputs,$HWpercent,$hwElements);
$exBreakdown = catBreakdown2($getEXInputs,$EXpercent,$exElements);
$qzBreakdown = catBreakdown2($getQZInputs,$QZpercent,$qzElements);
$pjBreakdown = catBreakdown2($getPJInputs,$PJpercent,$pjElements);
$dg = $_POST["desiredGrade"];
$total = $hwTotal+$exTotal+$qzTotal+$pjTotal;
catSuggestionOne($hwBreakdown, $exBreakdown, $qzBreakdown, $pjBreakdown, $dg, $total);
echo "<br>";
catSuggestionTwo($hwBreakdown, $exBreakdown, $qzBreakdown, $pjBreakdown, $dg, $total);

//echo $hwBreakdown[0];
//echo $hwBreakdown[1];


//$call = values();
//echo json_encode($call);

//values();



?>