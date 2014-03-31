<?php

$path = "files/"; // Upload directory
$count = 0;

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Loop $_FILES to execute all files
    foreach ($_FILES['files']['name'] as $f => $name) {
        echo $name . "<br>";
		//Checks if file was selected.
		if (empty($_FILES['logo']['name'])) {
		// No file was selected for upload.		
		//echo 'No file was selected';
		header("refresh:0; url=upload.php");
		}
        if ($_FILES['files']['error'][$f] == 4) {
            continue; // Skip file if any error found
        }

		else {
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path . $name))
                echo 'file succesfully uploaded';
            header("refresh:4; url=upload.php");
            $count++; // Number of successfully uploaded file
        }
    }
	;
}