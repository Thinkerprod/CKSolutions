<?php
include_once("../php_util/db.php");
include_once("admin_blog_functions.php");

?>

<div class="table-responsive" data-mdb-perfect-scrollbar="true">
<table class="table table-striped table-light table-sm">
    <thead class="table-light">
      <tr>
        <th scope="col">post_id</th>
        <th scope="col">post_title</th>
        <th scope="col">post_author</th>
        <th scope="col">post_date</th>
        <th scope="col">post_image</th>
        <th scope="col">post_content</th>
        <th scope="col">post_tags</th>
        <th scope="col">post_comment_count</th>
        <th scope="col">post_status</th>
      </tr>
    </thead>
<?php 
adminDisplayAllBusinessBlogPosts($connection); 
?>
</table></div>