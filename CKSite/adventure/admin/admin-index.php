<?php 
include_once "admin_includes/admin_header.php";
include_once "admin_includes/db_classes.php";
include_once "../php_util/db.php";
// $datetime=new DateTime('America/Regina');
// date_default_timezone_set("America/Regina");
// $post_date=$datetime->format("d-m-Y H:i:s");
// echo $post_date;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 d-flex flex-column">
        <?php include_once "admin_includes/admin_well.php";?>
        </div>
        <div class="col-lg-10 view-container">
        <?php include_once "admin_includes/controller.php";?>
        </div>
    </div>

    


    

    

    

</div>
<?php include_once "admin_includes/admin_footer.php"; ?>