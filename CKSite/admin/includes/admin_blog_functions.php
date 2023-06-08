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
    echo "<td scope='row'>{$post_cat_id}</td>";
    echo "<td scope='row'>{$post_title}</td>";
    echo "<td scope='row'>{$post_author}</td>";
    echo "<td scope='row'>{$post_date}</td>";
    echo "<td scope='row'>{$post_image}</td>";
    echo "<td scope='row' style='width:200px'>{$post_content}</td>";
    echo "<td scope='row'>{$post_tags}</td>";
    echo "<td scope='row'>{$post_comment_count}</td>";
    echo "<td scope='row'>{$post_status}</td>";
    echo "<td scope='row'><a class='db-link' href='blog_functions/editPost.php?p_id=".$post_id."'>edit</a></td>";
    echo "<td scope='row'><a class='db-link' href='blog_functions/deleteFromPosts.php?p_id=".$post_id."'>delete</a></td></tr>";


}
}

function adminDisplayAllPersonalBlogPosts($connection){
    $query="SELECT * FROM posts WHERE NOT post_category_id=1";
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
        echo "<td scope='row'>{$post_cat_id}</td>";
        echo "<td scope='row'>{$post_title}</td>";
        echo "<td scope='row'>{$post_author}</td>";
        echo "<td scope='row'>{$post_date}</td>";
        echo "<td scope='row'>{$post_image}</td>";
        echo "<td scope='row' style='width:200px'>{$post_content}</td>";
        echo "<td scope='row'>{$post_tags}</td>";
        echo "<td scope='row'>{$post_comment_count}</td>";
        echo "<td scope='row'>{$post_status}</td>";
        echo "<td scope='row'><a class='db-link'  href='blog_functions/editPost.php?p_id=".$post_id."'>edit</a></td>";
        echo "<td scope='row'><a class='db-link' href='blog_functions/deleteFromPosts.php?p_id=".$post_id."'>delete</a></td></tr>";

        
    
    
    }
    }

    function adminDisplayAllCreativeWritingPosts($connection){
        $query="SELECT * FROM cw";
        $select_all_business_posts_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_all_business_posts_query)){
            $writing_id=$row['writing_id'];
            $writing_title=$row['writing_title'];
            $writing_author=$row['writing_author'];
            $writing_genre_id=$row['writing_genre_id'];
            $writing_date=$row['writing_date'];
            $writing_content=$row['writing_content'];
            $writing_comment_count=$row['writing_comment_count'];
            $writing_tags=$row['writing_tags'];
            $writing_status=$row['writing_status'];
           
        
        
            
            echo "<td scope='row'>{$writing_id}</td>";
            echo "<td scope='row'>{$writing_title}</td>";
            echo "<td scope='row'>{$writing_author}</td>";
            echo "<td scope='row'>{$writing_genre_id}</td>";
            echo "<td scope='row'>{$writing_date}</td>";
            echo "<td scope='row' style='width:200px'>{$writing_content}</td>";
            echo "<td scope='row'>{$writing_comment_count}</td>";
            echo "<td scope='row'>{$writing_tags}</td>";
            echo "<td scope='row'>{$writing_status}</td>";
            echo "<td scope='row'><a class='db-link' href='#'>edit</a></td>";
            echo "<td scope='row'><a class='db-link' href='#'>delete</a></td></tr>";
        
        
        }
        }



?>