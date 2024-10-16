<?php 
include_once "../../php_util/db.php";

if(isset($_POST['QuickSubmit'])){
    $tag_name=$_POST['quick_tag'];

    $CW_tag_create_stmt->bind_param("s",$tag_name);
    $CW_tag_create_stmt->execute();
    $connection->close();
    echo "added";
}

header("Location: ../admin-index.php?src=add-cw");
?>