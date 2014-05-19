<?php
include ('../../config/database.php');
$connection = new Database();
$connection->openConnection(); // connected to the database 
var_dump($_POST);
if (isset($_POST['need_delete'])) {

$array[] =$_POST['need_delete'];

$t= "0";
foreach ($array[0] as $a) {
$sql = sprintf("DELETE FROM  `users` WHERE  `id` =  '%s'",
	mysql_real_escape_string($array[0][$t])
	);
	mysql_query($sql) or die (mysql_error());
$t++;

}
$connection->closeConnection();
header("location:../../views/admin/userManagement.php");
}

?>