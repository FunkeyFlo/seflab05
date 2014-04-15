<?php
session_start();
if (isset($_SESSION['count']) && $_SESSION['count'] !== '') {
    header("location: ../views/home.php");
}
?>
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
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action='../functions/login.php' method='POST'>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" value="login" class="btn btn-lg btn-success btn-block"></a>
									<label><a href="../views/register.php"><i class="fa fa-sign-out fa-fw"></i> Or klik here to sign up.</a></label>
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

    </body>

</html>