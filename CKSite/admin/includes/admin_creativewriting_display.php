<?php
include_once("../php_util/db.php");
include_once("admin_blog_functions.php");

?>

<div class="table-responsive" data-mdb-perfect-scrollbar="true">
<table class="table table-striped table-light table-sm">
    <thead class="table-light">
      <tr>
        <th scope="col">writing_id</th>
        <th scope="col">writing_title</th>
        <th scope="col">writing_author</th>
        <th scope="col">writing_genre_id</th>
        <th scope="col">writing_date</th>
        <th scope="col">writing_content</th>
        <th scope="col">writing_comment_count</th>
        <th scope="col">writing_tags</th>
        <th scope="col">writing_status</th>
      </tr>
    </thead>
<?php 
adminDisplayAllCreativeWritingPosts($connection); 
?>
</table></div>