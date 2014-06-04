

<?php
// <tr role=\"row\"><th class=\"sorting_asc\" tabindex=\"0\"aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"<!--name-->: activate to sort column ascending\" style=\"width: 35px;\"><!--name--></th>
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


$sql1 = mysql_query("SELECT `id`, `name`,`uploaded_at` FROM `unprocessed_uploads`  WHERE `owner_id` ='$id' ORDER BY uploaded_at")
 or die(mysql_error());
$result = $sql1;






?>
<form role="form" action='../functions/login.php' method='POST'>
<div class="row">
    <div class="col-lg-12">
	
        <h1 class="page-header">My Uploads</h1>
		<div id ="middle">
<?php
		echo "<table class=\"table table-striped table-bordered table-hover dataTable no-footer\" id=\"dataTables-example\" aria-describedby=\"dataTables-example_info\">
                                    <thead>
                                  
									
								<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Lastname: activate to sort column ascending\" style=\"width: 158px;\">Name</th>
										<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Lastname: activate to sort column ascending\" style=\"width: 158px;\">Uploaded at</th>
										<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Lastname: activate to sort column ascending\" style=\"width: 158px;\">Processed at</th>
										

                                    </thead>";

while ($row = mysql_fetch_array($result)) {
$upload_id = $row['id']; 
$sql2 = mysql_query("SELECT `processed_at` FROM `processed_uploads`  WHERE `id` ='$upload_id'")
 or die(mysql_error());
$processed = mysql_fetch_array($sql2);
if ($processed['processed_at'] != ""){
	
} else{
$processed['processed_at'] = "Not processed yet";
}

									
									    echo "	<tr class=\"\" style=\"text-align:center;\">

												<td class=\"\">" . $row['name'] . "</td>
												<td class=\"\">" . $row['uploaded_at'] . "</td>
												<td class=\"\">" . $processed['processed_at'] . "</td>"




   ;  }
$connection->closeConnection();										

?>	
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?php
include '../layout/footer.php';

?>