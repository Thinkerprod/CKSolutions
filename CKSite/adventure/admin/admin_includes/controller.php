<?php
if(isset($_GET['src'])){
    $src=$_GET['src'];
}
else{
    $src='';
}
switch($src){
    case "add-post":
        include_once "admin_includes/add_posts_form.php";
    break;
    case "add-cw":
        include_once "admin_includes/add_cw_form.php";
    break;
    case "add-gallery":
        include_once "admin_includes/add_gallery_form.php";
    break;
   default:
   include_once "admin_includes/defaultView.php"; 
}
?>