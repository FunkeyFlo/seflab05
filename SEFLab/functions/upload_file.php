<?php
$valid_formats = array("ova", "sh");//accepted file upload extensions
$min_file_size =0; // 0 bytes
$path = "../files/"; // Upload directory
$count = 0;

include '../config/database.php';
$connection = new Database();
$connection->openConnection(); // connected to the database

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$file = $_FILES['files'];
	for($index = 0; $index < count($file['name']); $index++) {   
	$name = $file['name'][$index];	
	    if ($file['error'][$index] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($file['error'][$index] == 0) {	           
	        if ($file['size'][$index] < $min_file_size) {
	            echo "$name is not a valid file!.<br />\n";
	            continue; // Skip unvalid file
	        }
			elseif( ! in_array(pathinfo($file['name'][$index], PATHINFO_EXTENSION), $valid_formats) ){
				echo "$name is not a valid format <br />\n";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($file["tmp_name"][$index], $path.$name))
				echo "$name was successfully uploaded. <br />\n";
				header("refresh:0; url=../views/home.php");
	            $count++; // Number of successfully uploaded file
				//$stored= 'upload/' . $name;
	        }
	    }
	}
	
	session_start();
	$email = $_SESSION["usrname"]; 	
	
	$result = mysql_query("SELECT `id` FROM `users` WHERE `email`='$email'") or die(mysql_error());
	if(is_resource($result) and mysql_num_rows($result)>0){
    $row = mysql_fetch_array($result);
    $userid = $row["id"];
    }

	$text = $_POST['text'];
	$path1 = 'files/' . $file['name'][0]; 
	$path2 = 'files/' . $file['name'][1]; 
	$query = "INSERT INTO `unprocessed_uploads`(`filepath_vm`, `filepath_script`, `uploaded_at`, `being_processed`, `name`, `owner_id`) 
						  VALUES ('$path1','$path2',CURRENT_TIMESTAMP,0,'$text','$userid')";
				mysql_query($query); 
}
