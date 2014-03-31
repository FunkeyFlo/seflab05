<?PHP
session_start();

if (!(isset($_SESSION['count']) && $_SESSION['count'] !== '')) {
    header("location: index.php");
}
?>
<html>
    <head>		
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Upload</title>

        <!-- Core CSS - Include with every page -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Page-Level Plugin CSS - Blank -->

        <!-- SB Admin CSS - Include with every page -->
        <link href="css/sb-admin.css" rel="stylesheet">
		
		<!--Style sheet for the upload progress bar -->
		<link href="progressbar/progressbarstyle.css" rel="stylesheet">
    </head>
    <body><div id="wrapper">

            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.html"><img src="img/logo1.png"></a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

            </nav>
            <!-- /.navbar-static-top -->

            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="home.php"> Home</a>
                        </li>
                        <li>
                            <a href="upload.php">Upload</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>

                        <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </nav>
            <!-- /.navbar-static-side -->

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Upload</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <form action="upload_file.php" method="post" enctype="multipart/form-data">
                    <input type="file" id="file" name="files[]" multiple="multiple" 
					style="width: 650px;
						height: 22px;">
						</br>
                    <input type="submit" value="Upload" />	
 <div class="progress">  
     <div class="bar"></div >  
     <div class="percent">0%</div >  
   </div>  
   <div id="status"></div>  
 <script src="progressbar/jquery.js"></script>  
 <script src="progressbar/jquery.form.js"></script>  
 <script>  
 (function() {  
 var bar = $('.bar');  
 var percent = $('.percent');  
 var status = $('#status');  
 $('form').ajaxForm({  
   beforeSend: function() {  
     status.empty();  
     var percentVal = '0%';  
     bar.width(percentVal)  
     percent.html(percentVal);  
   },  
   uploadProgress: function(event, position, total, percentComplete) {  
     var percentVal = percentComplete + '%';  
     bar.width(percentVal)  
     percent.html(percentVal);  
   },  
   complete: function(xhr) {  
     bar.width("100%");  
     percent.html("100%");  
     status.html(xhr.responseText);  
   }  
 });   
 })();      
 </script>  					
                    <!-- /.row -->				
            </div>			
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- Core Scripts - Include with every page -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

        <!-- Page-Level Plugin Scripts - Blank -->

        <!-- SB Admin Scripts - Include with every page -->
        <script src="js/sb-admin.js"></script>

        <!-- Page-Level Demo Scripts - Blank - Use for reference -->
		
    </body>

</html>
