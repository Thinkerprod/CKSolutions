<?php 
include_once "php_util/db.php";
//posts
//create
$post_create_stmt=$connection->prepare("INSERT INTO posts (post_title, post_date,post_content, post_category) VALUES (?,?,?,?)");
$post_create_stmt->bind_param("sss", $post_title, $post_date, $post_category, $post_tag);
//read
// $post_read_stmt=$connection->prepare("SELECT * FROM posts WHERE id=");



function read_All_Posts($connection){
    $sql_read_all_posts="SELECT * FROM posts";
    $result=mysqli_query($connection,$sql_read_all_posts);
   if(confirmQuery($result)){
    while($row=mysqli_fetch_assoc($result)){
$post_title=$row['post_title'];
$post_author=$row['post_author'];
$post_date=$row['post_date'];
$post_content=$row['post_content'];
$post_image=$row['post_image'];
$post_category=$row['post_category'];
$post_comment_count=$row['post_comment_count'];
$post_published=$row['post_published'];



    }
   }
}
?>