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

$ajax_action = isset($_POST['ajax_action']) ? $_POST['ajax_action'] : '';

$userID = $_SESSION['userID'];
$to_user = $_POST['to_user'];
$msg = $_POST['text'];

if($ajax_action == 'send'){
    $res = $sql = "INSERT INTO chatlog SET timestamp = NOW(), text = '".$msg."', from_user_id = '".$userID."', to_user_id = '".$to_user."'";

    if ($conn->query($sql) === TRUE) {
        $return["status"] = true;
    } else {
        $return["error"] = "Error: " . $sql . "<br>" . $conn->error;
    }

    echo json_encode($return);
    exit;
}
