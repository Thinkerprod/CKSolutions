<?php 

include_once "../php_util/db.php";
include_once "blog-functions.php";
if(isset($_GET['src'])){
$src=$_GET['src'];
}
else{
    $src='';
}

switch($src){
    case "recent":
        readAllBusinessPosts($connection);
        break;
    case "post":
        readSelectedBlogPost($connection);
        break;
    case "month":
        readPostsByMonth($connection);
        break;
    case "year":
        readPostsByYear($connection);
        break;
    case "genre":
        break;
    default:
    readAllBusinessPosts($connection);


}





?>








