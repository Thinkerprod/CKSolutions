<?php 

include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $mat_create_stmt->bind_param("s",$mat_input);
    $mat_input=$_POST['mat_input'];
    $mat_create_stmt->execute();
    $mat_create_stmt->close();
    $connection->close();
    header("Location:../admin-index.php");
    
}

?>