<?php
include ('../config/database.php');
$connection = new Database();
$connection->openConnection(); // connected to the database 
$tbl_name = "users";

$firstname 	= mysql_real_escape_string($_POST['firstname']);
$surname = mysql_real_escape_string($_POST['lastname']);
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$hash = mysql_real_escape_string(crypt($password));

$check="SELECT * FROM $tbl_name WHERE email='$email'";
$result=mysql_query($check);

$count=mysql_num_rows($result);

if($count==1)
{
echo "E-mail already used";
}else{
$sql = sprintf("INSERT INTO  $tbl_name ( `email` ,  `password` , `firstname` , `lastname` ) 
values ('%s','%s','%s','%s')",
  mysql_real_escape_string($_POST['email']),
  mysql_real_escape_string($hash),
  mysql_real_escape_string($_POST['firstname']),
  mysql_real_escape_string($_POST['lastname'])
);

mysql_query($sql) or die (mysql_error());
}
$check="SELECT * FROM $tbl_name WHERE email='$email'";
$result=mysql_query($check);

$count=mysql_num_rows($result);
if($count==1){
header("refresh:2; url = ../index.php");
echo "\n account created";
}else{
header("refresh:2; url = ../views/register.php");
echo "\n account not created";
}

$connection->closeConnection();
?>