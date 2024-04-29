<?php 
include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $tag_name=mysqli_escape_string($connection,$_POST['cw_tag_input']);

    $CW_tag_create_stmt->bind_param("s",$tag_name);
    $CW_tag_create_stmt->execute();
    $connection->close();
    echo "added";
    header("Location: ../admin-index.php");
}


?>