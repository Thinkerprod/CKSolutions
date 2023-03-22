<?php
require_once("../php_util/db.php");
class blog{

function adminDisplayAllBusinessBlogPosts(){
$query="SELECT * FROM posts WHERE post_category_id=1";
$select_all_business_posts_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_all_business_posts_query)){
    $post_id=$row['post_id'];
    $post_title=$row['post_title'];
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_comment_count'];
    $post_status=$row['post_status'];



    echo "<tr><td>{$post_id}</td>";
    echo "<td>{$post_title}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_date}</td>";
    echo "<td>{$post_image}</td>";
    echo "<td>{$post_content}</td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comment_count}</td>";
    echo "<td>{$post_status}</td>";
    echo "<td><a class='db-link' href='#'>edit</a></td>";
    echo "<td><a class='db-link' href='#'>delete</a></td></tr>";


}
}


}

?>