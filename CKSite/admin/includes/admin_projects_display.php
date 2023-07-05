<?php
include_once("../php_util/db.php");
include_once("admin_proj_functions.php");

?>

<div class="table-responsive" data-mdb-perfect-scrollbar="true">
<table class="table table-striped table-light table-sm">
    <thead class="table-light">
      <tr>
        <th scope="col">proj_id</th>
        <th scope="col">proj_name</th>
        <th scope="col">proj_status</th>
        <th scope="col">proj_location</th>
        <th scope="col">proj_image</th>
        <th scope="col">proj_stack</th>
        <th scope="col">proj_desc</th>
        <th scope="col">proj_date</th>
      </tr>
    </thead>
<?php 
adminDisplayAllProjects($connection); 
?>
</table></div>