<?php
   $servername = "mysql.cs.iastate.edu";
   $username = "dbu309ss3";
   $password = "MDE1MGYyODVi";
   $dbname = "db309ss3";
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = $conn->query("select id from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['id'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>