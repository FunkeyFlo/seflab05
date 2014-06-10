<?php
include ('../config/database.php');
$connection = new Database();
$connection->openConnection(); // connected to the database 
$tbl_name = "users";
session_start();
$id = $_SESSION['id'];

$firstname 	= mysql_real_escape_string($_POST['firstname']);
$surname = mysql_real_escape_string($_POST['lastname']);

$password = mysql_real_escape_string($_POST['password']);
$hash = mysql_real_escape_string(crypt($password));

$count = 0;


if($count == 1){
}else{
$sql = sprintf("UPDATE $tbl_name SET `password`='%s',`firstname`='%s',`lastname`='%s' WHERE id = '$id' ",

  mysql_real_escape_string($hash),
  mysql_real_escape_string($_POST['firstname']),
  mysql_real_escape_string($_POST['lastname'])
);

mysql_query($sql) or die (mysql_error());
}

if($count == 1){
}else{header("refresh:1; url = ../views/home.php");
echo "\n Setting changed";}
?>