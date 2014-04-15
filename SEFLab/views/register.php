<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>

        <!-- Core CSS - Include with every page -->
        <link href="../layout/css/bootstrap.min.css" rel="stylesheet">
        <link href="../layout/font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- SB Admin CSS - Include with every page -->
        <link href="../layout/css/sb-admin.css" rel="stylesheet">
		
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <center><img src="../layout/img/logo1.png"></center>
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign up</h3>
                        </div>
                        <div class="panel-body">
                            <form name="register_form" action='../functions/create_user.php' method='POST'>
                                <fieldset>
									<div class="form-group">
											<label>Enter E-mail address</label>
											<input class="form-control" name="email" type="email">
									</div>
									<div class="form-group">
											<label>Enter Password</label>
											<input class="form-control" name="password" type="password">
									</div>
									<div class="form-group">
											<label>Enter Firstname</label>
											<input class="form-control" name="firstname">
									</div>
									<div class="form-group">
											<label>Enter Surname</label>
											<input class="form-control" name="lastname">
									</div>	
									<div class="form-group">
											 <label class="checkbox-inline">
                                             <input type="checkbox" name="agreed" onchange="enable()">I have read and agree to the Terms & Conditions.
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" value="Sign up" disabled name="submit_button" class="btn btn-lg btn-success btn-block"></a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Scripts - Include with every page -->
        <script src="../layout/js/jquery-1.10.2.js"></script>
        <script src="../layout/js/bootstrap.min.js"></script>
        <script src="../layout/js/plugins/metisMenu/jquery.metisMenu.js"></script>

        <!-- SB Admin Scripts - Include with every page -->
        <script src="../layout/js/sb-admin.js"></script>
		
		<script src="../layout/js/enable.js" type="text/javascript"></script>
		
		

    </body>

</html>