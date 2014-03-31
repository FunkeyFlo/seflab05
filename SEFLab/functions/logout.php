<?php
session_start();
session_destroy();
header('refresh:0; url=../index.php');
echo 'you have been succesfully logged off';
?>