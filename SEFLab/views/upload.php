<?PHP
session_start();

if (!(isset($_SESSION['count']) && $_SESSION['count'] !== '')) {
    header("location: ../index.php");
}
include '../layout/header.php';
include '../layout/sidebar.php';
?>

	 <div class="row">
	 
                    <div class="col-lg-12">
                        <h1 class="page-header">Upload</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <form action="../functions/upload_file.php" method="post" enctype="multipart/form-data">
				<link href="../layout/js/progressbar/progressbarstyle.css" rel="stylesheet">
                    <label for="file1">Virtual Machine:</label>
					<input type="file" id="vm" name="files[]" multiple="multiple"/>
					</br>
					<label for="file2">Load Script:</label>
					<input type="file" id="script" name="files[]" multiple="multiple" 
					style="width: 650px;
						height: 22px;">
						</br>
					Please name your VM: <input type="text" name="text" id="text"/>
							</br>	
                    <input type="submit" value="Submit" />	
					</br>
					
 <div class="progress">  
     <div class="bar"></div >  
     <div class="percent">0%</div >  
   </div>  
   <div id="status"></div>  
 <script src="../layout/js/progressbar/jquery.js"></script>  
 <script src="../layout/js/progressbar/jquery.form.js"></script>  
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
	
    <?php
    include '../layout/footer.php';
    ?>