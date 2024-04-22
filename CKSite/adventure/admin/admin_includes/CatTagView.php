<?php include_once "admin_includes/db_classes.php";?>

<div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="row">
        <div class="col-12">
        <?php read_All_Categories($connection)?>
        </div>
        <div class="col-12">
        <?php read_All_Tags($connection)?>   
        </div>
    </div>
    
</div>