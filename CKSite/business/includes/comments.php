<?php 

//creating a comment
include "../../php_util/db.php";
include "blog-functions.php";

if(isset($_POST['btn-submit'])){
    $com_post_id=getPostId();
    $com_name=mysqli_real_escape_string($connection, $_POST['name']);
    $com_email=$_POST['email'];
    $com_content=mysqli_real_escape_string($connection, $_POST['comment']);
    $com_date=date("d m Y");



    $query="INSERT INTO comments (com_post_id,com_name,com_email,com_date,com_content) VALUES('{$com_post_id}','{$com_name}','{$com_email}','{$com_date}','{$com_content}')";
    $commentQuery=mysqli_query($connection,$query);
    confirmQuery($commentQuery);
    if($commentQuery){
            //increment the comment counter in posts db
    commentCounter($connection);
    header("Location: ../../business/blog-business.php?source=post&p_id={$com_post_id}");
    }
    

}


?>