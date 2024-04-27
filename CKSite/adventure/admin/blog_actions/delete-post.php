<?php 
include_once "../../php_util/db.php";

if(isset($_GET['p_id'])){
    $post_id=$_GET['p_id'];

    $delete_post_stmt->bind_param("i",$post_id);
    $delete_post_stmt->execute();
    confirmQuery($delete_post_stmt);
    $delete_post_tag_stmt->bind_param("i",$post_id);
    $delete_post_tag_stmt->execute();
    if(confirmQuery($delete_post_tag_stmt)){
        $connection->close();
        echo "row deleted";

    }
    
   
}

?>