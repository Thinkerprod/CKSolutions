<?php
include_once "../../php_util/db.php";
if(isset($_GET['cat_id'])){
    
    $cat_id=$_GET['cat_id'];
    $cat_delete_stmt->bind_param("i",$cat_id);
    $cat_delete_stmt->execute();
    $connection->close();

}


?>