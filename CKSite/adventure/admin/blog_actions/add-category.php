<?php 
include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $cat_name=$_POST['cat_input'];

    $cat_create_stmt->bind_param("s",$cat_name);
    $cat_create_stmt->execute();
    $connection->close();
    echo "added";
}


?>