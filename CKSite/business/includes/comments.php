<?php 

//creating a comment
include "../../php_util/db.php";
include "blog-functions.php";

if(isset($_POST['btn-submit'])){
    $com_post_id=getPostId();
    $com_name=mysqli_real_escape_string($connection, $_POST['name']);
    $com_email=mysqli_real_escape_string($connection, $_POST['email']);
    $com_content=mysqli_real_escape_string($connection, $_POST['comment']);

    $query="INSERT INTO comments (com_post_id,com_name,com_email,com_date,com_content,com_status) VALUES()";


}


?>