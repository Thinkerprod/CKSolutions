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
    case "add-post":
        // include_once "admin_includes/add_posts_form.php";
    break;


    case "read-cw":
        // include_once "admin_includes/cw_view.php";
    break;
    case "add-gallery":
        // include_once "admin_includes/add_gallery_form.php";
    break;
    case "edit":
        // include_once "admin_includes/edit_posts_form.php";
    break;
    

   default:
   include_once "includes/blog_default.php"; 
}
?>