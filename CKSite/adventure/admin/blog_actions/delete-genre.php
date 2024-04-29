<?php
include_once "../../php_util/db.php";
if(isset($_GET['g_id'])){
    
    $g_id=$_GET['g_id'];

    $genre_delete_stmt->bind_param("i",$g_id);
    $genre_delete_stmt->execute();
    $connection->close();
    echo "deleted";
    header("Location: ../admin-index.php");
}


?>