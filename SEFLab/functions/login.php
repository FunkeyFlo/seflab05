<?php
include ('../config/database.php');
$connection = new Database();
$connection->openConnection(); // connected to the database 
$tbl_name = "users";

$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$sql = mysql_query("SELECT `password`, `id`, `user_group` FROM `users` WHERE `email`='$email'")
	or die(mysql_error());
$result = $sql;
$verify = mysql_fetch_array($sql);
$count = mysql_num_rows($result);
$connection->closeConnection();

if ($verify['user_group'] == 1 && $count == 1 && crypt($password, $verify['password']) == $verify['password']) {
    session_start();
    $_SESSION['count'] = '1';
	$_SESSION['usrname'] = $email ; //storing variable into session
	$_SESSION['id'] = $verify['id'];
	$_SESSION['user_group'] = $verify['user_group'];
//    $_SESSION['password']= $password;
    header("location:../views/home.php");
} elseif ($verify['user_group'] == 0 && $count == 1 && crypt($password, $verify['password']) == $verify['password']) {
	session_start();
    $_SESSION['count'] = '1';
	$_SESSION['usrname'] = $email ; //storing variable into session
	$_SESSION['id'] = $verify['id'];
	$_SESSION['user_group'] = $verify['user_group'];
    header("location:../views/admin/user_management.php");
}else {    
    $_SESSION['count'] = '0';
    header("refresh:5; url = ../index.php");
    echo "Wrong Username or Password";
}
?>