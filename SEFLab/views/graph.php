<?php

session_start();
if (!(isset($_SESSION['count']) && $_SESSION['count'] !== '')) {
    header("location: ../index.php");
}
include '../layout/js/graph.js';
include '../layout/header.php';
include '../layout/sidebar.php';

?>

<div class="row">
    <div class="col-lg-12">
	
	<div id ="middle">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
	

</div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
	</head>
	<body>
		<div id="chart" style="width: 100%; height: 100%; "></div>
		
		</body>
		

<?php
//include '../layout/footer.php';
?>