<?php 
include_once "../../php_util/db.php";

if(isset($_GET['t_id'])){
    $tag_id=$_GET['t_id'];

    $CW_tag_delete_stmt->bind_param('i',$tag_id);
    $CW_tag_delete_stmt->execute();
    $connection->close();
    echo "deleted";

    header("Location:../admin-index.php");
}


?>