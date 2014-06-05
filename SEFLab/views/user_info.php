<?php

session_start();
if (!(isset($_SESSION['count']) && $_SESSION['count'] !== '')) {
    header("location: ../index.php");
}

include '../layout/header.php';
include '../layout/sidebar.php';

include ('../config/database.php');
$connection = new Database();
$connection->openConnection(); // connected to the database 
$id= $_SESSION['id'];

?>

<div class="row">
    <div class="col-lg-12">
	
        <h1 class="page-header">My Info</h1>
		<div id ="middle">
		
		</div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->


<?php

include '../layout/footer.php';

$connection->closeConnection();	

?>