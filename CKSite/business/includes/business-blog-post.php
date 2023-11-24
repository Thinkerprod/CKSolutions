<?php 

include_once "../php_util/db.php";
include_once "blog-functions.php";
if(isset($_GET['source'])){
$source=$_GET['source'];

switch($source){
    case "recent":
        readAllBusinessPosts($connection);
        break;
    case "post":
        readSelectedBlogPost($connection);
        break;
    case "month":
        break;
    case "year":
        break;
    case "genre":
        break;
    default:
    readAllBusinessPosts($connection);


}

}
else{
    readAllBusinessPosts($connection);
}


?>








