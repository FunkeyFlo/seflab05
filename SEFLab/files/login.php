<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of queryManager
 *
 * @author Jay
 */
$email = $_POST['email'];
$password = $_POST['password'];

include ('database.php');
$connection = new Database();
$connection->openConnection(); // connected to the database 
$tbl_name = "users";
$sql = "SELECT * FROM $tbl_name WHERE email='$email' and "
        . "password='$password' LIMIT 1";

$result = mysql_query($sql);
$count = mysql_num_rows($result);
$connection->closeConnection();

if ($count == 1) {
    session_start();
    $_SESSION['count'] = '1';
//    $_SESSION['password']= $password;
    header("location:home.php");
} else {
    session_start();
    $_SESSION['count'] = '0';
    header("refresh:15; url = index.php");
    echo "Wrong Username or Password";
}