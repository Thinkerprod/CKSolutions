<?php
if(isset($_GET['src'])){
    $src=$_GET['src'];
}
else{
    $src='';
}
switch($src){


    case "read":
        include_once "includes/blog_view.php";
    break;
    case "cats":
        include_once "includes/blog_cats_results.php";
    break;


    case "tags":
        include_once "includes/blog_tags_results.php";
    break;
    case "search":
        // include_once "admin_includes/blog_search_results.php";
    break;
    case "month":
        // include_once "admin_includes/edit_posts_form.php";
    break;
    case "year":
        // include_once "admin_includes/edit_posts_form.php";
    break;
    

   default:
   include_once "includes/blog_default.php"; 
}
?>