
<iframe src="/Final_Demo/HomePage/navigation.html" width="1450" height="200"> </iframe>

<?php

$file = $_FILES['uploadFile']['name'];
$tmp_file = $_FILES['uploadFile']['tmp_name'];

//gets file extension
$type = pathinfo($file,PATHINFO_EXTENSION);

$dir = "/var/www/html/studyGuide/uploads/";

if(isset($file))
{
	if(!empty($file) && $type == "pdf")
	{
	  	//echo exec('whoami');
		//stores file in server as original name
		if(move_uploaded_file($tmp_file,$dir.$file))
		{
			//echo "Success";
		}
                else {
		echo "cannot move No file chosen or wrong file type chosen";
                }


	}
	else
	{
		echo "No file chosen or wrong file type chosen";
		
	}
	
}



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
				Upload Study Materials
			</h3>
			<h3>
				Upload Study Guides, assignments, quizes, etc.
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<center><div class="col-md-4">
			<form action = "upload_complete.php" method = "post" enctype = "multipart/form-data">
				Upload a file in pdf form here<br>
				<center><input type = "file" name = "uploadFile" id = "uploadFile"></center>
				<input type = "submit" name = "Upload">
			</form>
		</div></center>
		<div class="col-md-4">
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<center><ol>
					Study guides will be below
			</ol></center>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>



<?php

$diro = opendir("/var/www/html/studyGuide/uploads");

//generates links
if($dir)
{
	while(false !== ($u = readdir($diro)))
	{
		if($u != "." && $u != "..")
		{
			echo $u;
			//echo "<center><a href='upload_complete.php?file=".$u."'>".$u."</a></center><br>\n";
			echo "<center><a href='./uploads/".$u."' download>".$u."</a></center><br>\n";
		}
	}
	closedir($diro);
}

?>