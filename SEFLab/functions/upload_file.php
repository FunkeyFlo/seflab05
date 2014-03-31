<?php

$path = "../files/"; // Upload directory
$count = 0;

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Loop $_FILES to exeicute all files
    foreach ($_FILES['files']['name'] as $f => $name) {
        echo $name . "<br>";
        if ($_FILES['files']['error'][$f] == 4) {
            continue; // Skip file if any error found
        } else {
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path . $name))
                echo 'file succesfully uploaded';
            header("refresh:0; url=../views/home.php");
            $count++; // Number of successfully uploaded file
        }
    };
}