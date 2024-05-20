<?php 
include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $cw_type=$_POST['cw_type_input'];

    $cw_type_create_stmt->bind_param("s",$cw_type);
    $cw_type_create_stmt->execute();
    $cw_type_create_stmt->close();
    $connection->close();

    header("Location:../admin-index.php");
}


?>