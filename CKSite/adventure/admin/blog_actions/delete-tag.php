<?php
include_once "../../php_util/db.php";
if(isset($_GET['t_id'])){
    
    $t_id=$_GET['t_id'];

    $post_tag_delete_tag_id_stmt->bind_param("i",$t_id);
    $post_tag_delete_tag_id_stmt->execute();
    $tag_delete_stmt->bind_param("i",$t_id);
    $tag_delete_stmt->execute();
    $connection->close();
    echo "deleted";
    header("Location: ../admin-index.php");

}


?>