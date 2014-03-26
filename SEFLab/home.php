<?php
session_start();
if (!(isset($_SESSION['count']) && $_SESSION['count'] !== '')) {
    header("location: index.php");
}
include 'header.php';
include 'sidebar.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Home</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php
include 'footer.php';
?>