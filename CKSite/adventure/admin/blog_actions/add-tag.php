<?php 
include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $tag_name=$_POST['tag_input'];

    $tag_stmt->bind_param("s",$tag_name);
    $tag_stmt->execute();
    $connection->close();
    echo "added";
}


?>