<?php 

include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $size_create_stmt->bind_param("s",$size_amount);
    $size_amount=$_POST['gallery_size_input'];
    $size_create_stmt->execute();
    $size_create_stmt->close();
    $connection->close();
    header("Location:../admin-index.php");
    
}

?>