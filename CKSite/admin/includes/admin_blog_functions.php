<?php
// include("../php_util/db.php");


function adminDisplayAllBusinessBlogPosts($connection){
$query="SELECT * FROM posts WHERE post_category_id=1";
$select_all_business_posts_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_all_business_posts_query)){
    $post_id=$row['post_id'];
    $post_cat_id=$row['post_category_id'];
    $post_title=$row['post_title'];
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_comment_count'];
    $post_status=$row['post_status'];


    
    echo "<td scope='row'>{$post_id}</td>";
    echo "<td scope='row'>{$post_title}</td>";
    echo "<td scope='row'>{$post_author}</td>";
    echo "<td scope='row'>{$post_date}</td>";
    echo "<td scope='row'>{$post_image}</td>";
    echo "<td scope='row' style='width:200px'>{$post_content}</td>";
    echo "<td scope='row'>{$post_tags}</td>";
    echo "<td scope='row'>{$post_comment_count}</td>";
    echo "<td scope='row'>{$post_status}</td>";
    echo "<td scope='row'><a class='db-link' href='#'>edit</a></td>";
    echo "<td scope='row'><a class='db-link' href='#'>delete</a></td></tr>";


}
}



?>