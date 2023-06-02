<?php 
include "../../php_util/db.php";

if(isset($_GET['p_id'])){

    $p_id=$_GET['p_id'];
    $query="DELETE FROM posts WHERE post_id=".$p_id;
    mysqli_query($connection,$query);
    header("Location: ../../admin");
}
?>