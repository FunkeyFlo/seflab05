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
        <h1 class="page-header">User management</h1>
    
<?php
include ('../../config/database.php');
$connection = new Database();
$connection->openConnection(); // connected to the database 
$tbl_name = "users";
$sql = mysql_query("SELECT * FROM users ORDER BY id")
or die(mysql_error());
$result = $sql;
$connection->closeConnection();
echo "<table class=\"table table-striped table-bordered table-hover dataTable no-footer\" id=\"dataTables-example\" aria-describedby=\"dataTables-example_info\">
                                    <thead>
                                        <tr role=\"row\"><th class=\"sorting_asc\" tabindex=\"0\"
aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"<!--name-->: activate to sort column ascending\" style=\"width: 35px;\"><!--name--></th><th class=\"sorting\" tabindex=\"0\"										
aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"ID: activate to sort column ascending\" style=\"width: 35px;\">ID</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Email: activate to sort column ascending\" style=\"width: 239px;\">Email</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Firstname: activate to sort column ascending\" style=\"width: 220px;\">Firstname</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTables-example\" rowspan=\"1\" colspan=\"1\" aria-label=\"Lastname: activate to sort column ascending\" style=\"width: 158px;\">Lastname</th></tr>
                                    </thead>";
while($row = mysql_fetch_array($result)){
echo "<form name=\"delete\" role=\"form\" action='../../functions/admin/delete_user.php' method='POST'>
<tr class=\"\" style=\"text-align:center;\"><td class=\"\"><input type=\"checkbox\" value=\" " . $row['id'] . " \" name=\"need_delete[]\"></td>
<td class=\"\">" . $row['id'] . "</td>
<td class=\"\">" . $row['email'] . "</td>
<td class=\"\">" . $row['firstname'] . "</td>
<td class=\"\">" . $row['lastname'] . "</tr>"
;  //$row['index'] the index here is a field name
}
echo "</table>";
echo "<input type=\"submit\" value=\"Delete\" onclick=\"alert('user(s) deleted');\">
</form>";
?>
</div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php
include '../../layout/admin/footer.php';
?>