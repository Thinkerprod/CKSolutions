<?php 

include_once "../../php_util/db.php";

if(isset($_POST['post_id'])){
    $post_id=$_POST['post_id'];
    $post_published=$_POST['post_published'];

    $publish_post_stmt->bind_param("ii",$post_published,$post_id);
    $publish_post_stmt->execute();
    $publish_post_stmt->close();
    $connection->close();
echo "successsful";
    // header("Location:admin-index.php");
    
}
?>