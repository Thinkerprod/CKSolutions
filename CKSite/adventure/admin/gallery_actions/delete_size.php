<?php 

include_once "../../php_util/db.php";

if(isset($_GET['s_id'])){
    $size_delete_stmt->bind_param("i",$size_id);
    $size_id=$_GET['s_id'];
    $size_delete_stmt->execute();
    $size_delete_stmt->close();
    $connection->close();
    header("Location:../admin-index.php");

}

?>