<?PHP
session_start();

if (!(isset($_SESSION['count']) && $_SESSION['count'] !== '')) {
    header("location: index.php");
}
include 'header.php';
include 'sidebar.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Upload</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
    <input type="file" id="file" name="files[]" multiple="multiple"  />
    <input type="submit" value="Upload!" />
    <!-- /.row -->
    <?php
    include 'footer.php';
    ?>