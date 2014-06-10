<?php
session_start();
if (!(isset($_SESSION['count']) && $_SESSION['count'] !== '')) {
    header("location: ../index.php");
}
include '../../layout/admin/header.php';
include '../../layout/admin/sidebar.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Queue</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<link rel="stylesheet" href="style.css" type="text/css">


<?php
include ('../../config/database.php');
$connection = new Database();
$connection->openConnection(); // connected to the database 
$tbl_name = "users";
$sql = mysql_query("SELECT * FROM unprocessed_uploads ORDER BY uploaded_at")
        or die(mysql_error());
$result = $sql;

echo "<table class=\"table table-striped table-bordered table-hover dataTable no-footer\" id=\"dataTables-example\" aria-describedby=\"dataTables-example_info\">
                                    <thead>

<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"ID: activate to sort column ascending\" style=\"width: 35px;\">ID</th>
<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Email: activate to sort column ascending\" style=\"width: 239px;\">VM filepath</th>
<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Firstname: activate to sort column ascending\" style=\"width: 220px;\">Script filepath</th>
<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Lastname: activate to sort column ascending\" style=\"width: 158px;\">Uploaded at</th>
<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Lastname: activate to sort column ascending\" style=\"width: 158px;\">Being processed</th>
<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Lastname: activate to sort column ascending\" style=\"width: 158px;\">Name</th>
<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Lastname: activate to sort column ascending\" style=\"width: 158px;\">User</th>
<th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Lastname: activate to sort column ascending\" style=\"width: 158px;\">Priority</th></tr>
                                    </thead>";
									//<td class=\"\">" . $row['priority'] . "</td>
while ($row = mysql_fetch_array($result)) {
   
   echo '		
   <form action=\'../../functions/admin/updatePriorities_deleteUpload.php\' method=\'POST\'>
				<tr class="" style="text-align:center;">
				<input type="hidden" name ="id" value=' . $row['id']. '>

<td class="">' . $row['id'] . ' 
			<input type="submit" name="delete_button" value="" class="imgClass2"></td>
<td class="">' . $row['filepath_vm'] . '</td>
<td class="">' . $row['filepath_script'] . '</td>
<td class="">' . $row['uploaded_at'] . '</td>
<td class="">' . $row['being_processed'] . '</td>
<td class="">' . $row['name'] . '</td>
<td class="">' . $row['owner_id'] . '</td>
<td class=""><select name="prior">     
				<option >1</option>
				<option >2</option>
				<option >3</option>
				<option >4</option>
				<option >5</option>
				<option >6</option>
				<option >7</option>
				<option >8</option>
				<option >9</option>	
				<option selected> '. $row['priority'] . '</option>
			</select>

			<input type="submit" name="update_button" value="" class="imgClass">
			
			</td>

			</form>
			
			
			
			
			
			
			
'	;  
}
//echo "</table>";
//echo "<input type='submit' id='aform' name='delete_button' value='Delete' onclick='alert('item(s) deleted');'>";
//echo "</form>";
$connection->closeConnection();

include '../../layout/admin/footer.php';
?>