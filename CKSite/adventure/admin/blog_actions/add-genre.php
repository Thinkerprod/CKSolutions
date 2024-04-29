<?php 
include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $genre_name=mysqli_escape_string($connection,$_POST['genre_input']);

    $genre_create_stmt->bind_param("s",$genre_name);
    $genre_create_stmt->execute();
    $connection->close();
    echo "added";
    header("Location: ../admin-index.php");
}


?>