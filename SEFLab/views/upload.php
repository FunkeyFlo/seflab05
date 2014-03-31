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
    <input type="file" id="file" name="files[]" multiple="multiple"  />
    <input type="submit" value="Upload!" />
    <!-- /.row -->
    <?php
    include '../layout/footer.php';
    ?>