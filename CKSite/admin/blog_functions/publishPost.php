<?php 
include "../../php_util/db.php";

if(isset($_GET['p_id'])){

    $post_id=$_GET['p_id'];

    $query="UPDATE posts SET post_status='published' WHERE post_id={$post_id}";

    $update_status_query=mysqli_query($connection,$query);
    confirmQuery($update_status_query);

header('Location:../../admin');

}

?>