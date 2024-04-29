<?php
include_once "../../php_util/db.php";
if(isset($_GET['m_id'])){
    
    $m_id=$_GET['m_id'];

    $media_delete_stmt->bind_param("i",$m_id);
    $media_delete_stmt->execute();
    $connection->close();
    echo "deleted";
    header("Location: ../admin-index.php");
}


?>