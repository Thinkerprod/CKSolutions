<?php
include_once("../php_util/db.php");
include_once("admin_paintings_functions.php");

?>

<div class="table-responsive" data-mdb-perfect-scrollbar="true">
<table class="table table-striped table-light table-sm">
    <thead class="table-light">
      <tr>
        <th scope="col">paint_id</th>
        <th scope="col">paint_title</th>
        <th scope="col">paint_media_id</th>
        <th scope="col">is_blacklight</th>
        <th scope="col">paint_year</th>
        <th scope="col">paint_material</th>
        <th scope="col">paint_status</th>
        <th scope="col">paint_image</th>
        <th scope="col">paint_tags</th>
      </tr>
    </thead>
<?php 
adminDisplayAllPaintings($connection); 
?>
</table></div>