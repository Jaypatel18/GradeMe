<!-- Got the UI from someones GIT but all the functionalities were done by Jay Patel -->

<?php
session_start();

$username = "dbu309ss3";
$password = "MDE1MGYyODVi";
$dbServer = "mysql.cs.iastate.edu";
$dbName = "db309ss3";

$conn = new mysqli($dbServer,$username,$password,$dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : '';
echo 'Your username: ' . $userName;

$sql = "SELECT * FROM users";

$users_query = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="facivon.ico">

    <title>GradeMe!</title>
    <link href="style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="script.js"></script>
  </head>
  <body>
  
  <div class="chat_box">
	<div class="chat_head"> Chat Box</div>
	<div class="chat_body">
<?php
        $width = '290px';

        while ($user = $users_query->fetch_assoc()) {

            if($user['user_id'] != $userID){

?>              <div class='user' id="<?= $user['userName'] ?>"><?= $user['userName'] ?></div>

                <div id="<?= $user['userName'] . '_box' ?>" class="msg_box" style="right:<?= $width ?>">
                    <div id="<?= $user['userName'] . '_head' ?>" class="msg_head"><?= $user['userName'] ?>
                        <div id="<?= $user['userName'] . '_close' ?>" class="close">x</div>
                    </div>

                    <div id="<?= $user['userName'] . '_wrap' ?>" class="msg_wrap">
                        <div class="msg_body">
                            <div class="msg_a">This is from A	</div>
                            <div class="msg_b">This is from B, and its amazingly kool nah... i know it even i liked it :)</div>
                            <div class="msg_push"></div>
                        </div>
                        <div class="msg_footer"><textarea id="<?= $user['user_id'] . '_input' ?>" class="msg_input" rows="4"></textarea></div>
                    </div>
                </div>

                <script>
                    $("#<?= $user['userName'] . '_close' ?>").click(function(){
                        $("#<?= $user['userName'] . '_box' ?>").hide();
                    });

                    $("#<?= $user['userName'] . '_head' ?>").click(function(){
                        $("#<?= $user['userName'] . '_wrap' ?>").slideToggle('slow');
                    });
                </script>
<?php
                $width = $width + 290;
            }// end if

        }// end while
?>
	</div>
  </div>



</body>
</html>
