<?php 
include_once "includes/sidewell_functions.php";
?>
<div class="text-start d-sm-none d-lg-flex flex-lg-column justify-content-center align-items-lg-start">
<h2 class="text-start h4 mx-sm-2 mx-lg-0 p-lg-0 " >Categories</h2>
<?php getAllPostCategories($connection);?>
<h2 class="text-start h4 mx-sm-2 mx-lg-0 p-lg-0" >Tags</h2> 
<?php getAllPostTags($connection)?>
</div>