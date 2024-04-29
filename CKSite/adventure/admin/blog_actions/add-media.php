<?php 
include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $media_input=mysqli_escape_string($connection,$_POST['media_input']);

    $media_create_stmt->bind_param("s",$media_input);
    $media_create_stmt->execute();
    $connection->close();
    echo "added";
    header('Location:../admin-index.php');
}


?>