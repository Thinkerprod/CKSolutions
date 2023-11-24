<?php 


// READ

function readAllBusinessPosts($connection){
    $query="SELECT * FROM posts WHERE post_category_id = 1 AND post_status='published' ";
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

   echo "<div class='blog-entry my-3' id='blogPost'>
    <h2>{$post_title}</h2>
    <h3>by $post_author</h3>
    <small>created on $post_date</small>

    <img class='post-image' src='images/blogImages/".$post_image."' alt=''>
    <p class='post-content' id='post-text'>{$post_content}</p>
        <p class='tags'>{$post_tags}</p>
        <a class='readMore' href='blog-business.php?source=post&p_id=".$post_id."'>Read More</a>
    </div>";



}


}

function readSelectedBlogPost($connection){

    if(isset($_GET['p_id'])){

    $p_id=$_GET['p_id'];

    $query="SELECT * FROM posts WHERE post_category_id = 1 AND post_id=".$p_id;
    $select_business_post_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_business_post_query)){
            $post_id=$row['post_id'];
            $post_cat_id=$row['post_category_id'];
            $post_title=$row['post_title'];
            $post_author=$row['post_author'];
            $post_date=$row['post_date'];
            $post_image=$row['post_image'];
            $post_content=$row['post_content'];
            $post_tags=$row['post_tags'];
            $post_comment_count=$row['post_comment_count'];
            // $post_status=$row['post_status'];

        echo "<div class='container-fluid expanded-blog-entry my-3' id='x-blogPost'>

        <div class='container-fluid d-flex text-center flex-column justify-content-center'>
        <h2>{$post_title}</h2>
        <h3>by {$post_author}</h3>
        <small>created on {$post_date}</small>
        <small>".$post_comment_count." Comments</small>
        </div>
        
        <p class='select-post-content mx-5 my-3 fs-4' id='post-text'>{$post_content}</p>
    
        <p class='tags text-center'>{$post_tags}</p>

        <div class='d-flex flex-column justify-content-start fs-4 comment-form mx-5'>

        <form action='comments.php' method='post' enctype='multipart/form-data'>

        <div class='row g-1 mb-3'>
        <div class='col-sm-4'>
        <label for='input-name' class='form-label'>Name</label>
        
        <input type='text' name='name' id='input-name' class='form-control'>
        </div>
        </div>

        <div class='row g-1 mb-3'>
        <div class='col-sm-4'>
        <label for='input-email' class='form-label'>E-mail</label>
        
        <input type='email' name='email' id='input-email' class='form-control'>
        </div>
        </div>
        
        <div class='row g-1 mb-3'>
        <div class='col-sm-6'>
        <label for='input-comment' class='form-label'>Comment</label>
        <textarea name='comment' class='form-control' id='input-comment' cols='30' rows='10'></textarea>
        </div>
        </div>
        
        <div class='row'>
        <div class='col-sm-md-4'>
        <input type='submit'  name='btn-submit' class='btn btn-primary' value='Submit'>
        </div>
        </div>
        
        </form>
    </div>
    </div>
    <div class='display-5 text-center comments my-3'>Comments</div>";

    }
}

}


function readAllComments($connection){
    if(isset($_GET['p_id'])){

        $p_id=$_GET['p_id'];


    $query="SELECT * FROM comments WHERE com_post_id =".$p_id." AND com_status='published'";
        $business_comments_query=mysqli_query($connection,$query);
        $comment_counter=0;
        while($row=mysqli_fetch_assoc($business_comments_query)){
            $com_id=$row['com_id'];
            $com_post_id=$row['com_post_id'];
            $com_name=$row['com_name'];
            $com_date=$row['com_date'];
            $com_content=$row['com_content'];
            $com_status=$row['com_status'];
            
            $comment_counter++;

            if($comment_counter>0){
                echo "<div class='container-fluid d-flex flex-column text-left comments my-3'>

                <h3>{$com_name}</h3>
                <small>Submitted {$com_date}</small>
                <p class='fs-5 text-left'>{$com_content}</p>
                <a href='#'>reply</a>
                </div>";
            }

            
        }
    }

}

function getPostId(){
    if(isset($_GET['p_id'])){
        $p_id=$_GET['p_id'];

        return $p_id;
    }
}

// function createComment($connection){
//     $com_content=mysqli_real_escape_string($connection, $_POST['name']);
//     $com_content=mysqli_real_escape_string($connection, $_POST['email']);
//     $com_content=mysqli_real_escape_string($connection, $_POST['comment']);
// }
?>
