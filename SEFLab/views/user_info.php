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

$sql = mysql_query("SELECT `id`,`firstname`,`lastname`,`password` FROM `users`  WHERE `id` ='$id'")
 or die(mysql_error());
$result = $sql;

?>

<body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    
                    <div class="login-panel panel panel-default">
                        
                        <div class="panel-body">
                            <form name="register_form" action='../functions/change_user.php' method='POST'>
                                <fieldset>
<?php
while ($row = mysql_fetch_array($result)) {

    echo'                           <div class="form-group">
                                    <label>Change Password</label>
                                    <input class="form-control" name="password"  value=>
                                    </div>
									
                                    <div class="form-group">
                                        <label>Change Firstname</label>
                                        <input class="form-control" name="firstname" value='.$row['firstname'].'>
                                    </div>
                                    <div class="form-group">
                                        <label>Change Lastname</label>
                                        <input class="form-control" name="lastname" value='.$row['lastname'].'>
                                    </div>	';}
?>
                                            <!-- Change this to a button or input when using this as a form -->
                                            <input type="submit" value="Change info"  class="btn btn-lg btn-success btn-block"></a>
                                            </fieldset>
                                            </form>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>


<?php

include '../layout/footer.php';

$connection->closeConnection();	

?>