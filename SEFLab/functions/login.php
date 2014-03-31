<?php

include ('../config/database.php');
$connection = new Database();
$connection->openConnection(); // connected to the database 
$tbl_name = "users";

$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$sql = "SELECT * FROM $tbl_name WHERE email='$email' and "
        . "password='$password' LIMIT 1";

$result = mysql_query($sql);
$count = mysql_num_rows($result);
$connection->closeConnection();

if ($count == 1) {
    session_start();
    $_SESSION['count'] = '1';
//    $_SESSION['password']= $password;
    header("location:../views/home.php");
} else {    
    $_SESSION['count'] = '0';
    header("refresh:15; url = ../index.php");
    echo "Wrong Username or Password";
}