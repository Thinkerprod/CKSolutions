<?php 
// CREATE

// READ

function readAllBusinessPosts($connection){
    $query="SELECT * FROM posts WHERE post_category_id = 1";
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

   echo "<div class='blog-entry' id='blogPost'>
    <h2>{$post_title}</h2>
    <h3>by $post_author</h3>
    <small>created on $post_date</small>

    <img class='post-image' src='' alt=''>
    <p class='post-content' id='post-text'>{$post_content}</p>
        <p class='tags'>{$post_tags}</p>
    </div>";

    echo "<div class='expanded-blog-entry' id='x-blogPost'>
    <button class='close-post' id='closePost'>
    <i class='fa-solid fa-x'></i>
    </button>
    <h2>{$post_title}</h2>
    <h3>by $post_author</h3>
    <small>created on $post_date</small>

    
    <p class='x-post-content' id='post-text'>{$post_content}</p>
        <p class='tags'>{$post_tags}</p>
    </div>";


}


}

// UPDATE

// DELETE




?>