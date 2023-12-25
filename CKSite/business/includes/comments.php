<?php 


include "../../php_util/db.php";
include "blog-functions.php";
if(isset($_GET['src'])){
    $src=$_GET['src'];
}
switch($src){
    case "comment":
        if(isset($_POST['btn-submit'])){
            createComment($connection);
            }
    break;

    case "reply":
        if(isset($_GET['op_com_id'])){
            createReply($connection);
        }
    
    break;

    case "delComment":
        if(isset($_GET['del_id'])){}
    deleteComment($connection);
    break;

    case "delReply":
        if(isset($_GET['del_id'])){}
    deleteReply($connection);
    break;

    default:


}

//creating a comment




?>