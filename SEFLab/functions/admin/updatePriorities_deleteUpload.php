<?php
include ('../../config/database.php');
$connection = new Database();
$connection->openConnection(); // connected to the database 
if (isset($_POST['update_button'])) {

		$id = $_POST['id'];
		$val= $_POST["prior"];
		$sql = mysql_query("UPDATE `unprocessed_uploads` SET `priority` = '$val' WHERE `id` = '$id'");
		mysql_query($sql);
		$connection->closeConnection();
		header("location:../../views/admin/queue.php");
		}

 else if (isset($_POST['delete_button'])) {
		$id = $_POST['id'];
		$sql = sprintf("DELETE FROM  `unprocessed_uploads` WHERE  `id` =  '$id'");
			
			mysql_query($sql) or die (mysql_error());
			
			
		
}
$connection->closeConnection();
header("location:../../views/admin/queue.php");


?>