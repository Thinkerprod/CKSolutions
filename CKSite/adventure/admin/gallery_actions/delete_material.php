<?php 

include_once "../../php_util/db.php";

if(isset($_GET['m_id'])){
    $mat_Delete_stmt->bind_param("i",$m_id);
    $m_id=$_GET['m_id'];
    $mat_Delete_stmt->execute();
    $mat_Delete_stmt->close();
    $connection->close();
    header("Location:../admin-index.php");

}

?>