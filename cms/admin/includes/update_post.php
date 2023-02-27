<?php

if(isset($_GET['p_id'])){
    $post_id=$_GET['p_id'];
}

$query="SELECT * FROM posts WHERE post_id={$post_id}";
                                $select_posts_by_id = mysqli_query($connection, $query);
 
                                   
                                while($row=mysqli_fetch_assoc($select_posts_by_id)){
//                                    $post_id=$row['post_id'];
                                $post_title=$row['post_title'];
                                    $post_cat_id=$row['post_cat_id'];
                                    $post_author=$row['post_author'];
                                    $post_date=$row['post_date'];
                                   
                                    $post_image=$row['post_image'];
                                    $post_content=$row['post_content'];
                                    $post_tags=$row['post_tags'];
                                    $post_comment_count=$row['post_comment_count'];
                                   
                                    $post_status=$row['post_status'];
                                    

                                }

if(isset($_POST['update_post'])){
                                
                                $post_title=$_POST['post_title'];
                                    $post_cat_id=$_POST['post_category'];
                                    $post_author=$_POST['post_author'];
//                                    $post_date=$_POST['post_date'];
                                   
                                    $post_image=$_FILES['post_image']['name'];
                                    $post_image_temp=$_FILES['post_image']['tmp_name'];
                                    $post_content=$_POST['post_content'];
                                    $post_tags=$_POST['post_tags'];
//                                    $post_comment_count=$_POST['post_comment_count'];
                                   
                                    $post_status=$_POST['post_status'];
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    if(empty($post_image)){
        $query="SELECT * FROM posts WHERE post_id={$post_id}";
        
        $select_image=mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($select_image)){
            $post_image=$row['post_image'];
        }
    }
    
    $query="UPDATE posts SET ";
    $query .="post_title= '{$post_title}', ";
    $query .="post_cat_id='{$post_cat_id}', ";
    $query .="post_author='{$post_author}', ";
    $query .="post_date=now(), ";
    $query .="post_status='{$post_status}', ";
    $query .="post_tags='{$post_tags}', ";
    $query .="post_image='{$post_image}', ";
    $query .="post_content='{$post_content}' ";
    $query .="WHERE post_id='{$post_id}' ";
    
    $updateQuery=mysqli_query($connection,$query);
    
    confirmQuery($updateQuery);
    
    
    header("Location: posts.php");
    
                               
}

?>

    <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="post_title">Title</label>
    <input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
    </div>
    
    <div class="form-group">
    <label for="post_category">Categories</label>
    <select name="post_category" id="post_cat">
        <?php  
         $query="SELECT * FROM categories";
                                $select_categories = mysqli_query($connection, $query);
                                confirmQuery($select_categories);
                                   
                                while($row=mysqli_fetch_assoc($select_categories)){
                                    $post_cat_id=$row['cat_id'];
                                $cat_title=$row['cat_title'];
                                    
                                    echo "<option value='{$post_cat_id}'>{$cat_title}</option>";
                                }
        
        
        ?>
        
        
    </select>
    </div>
    
    <div class="form-group">
    <label for="post_author">Author</label>
    <input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
    </div>
    
    <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
    </div>
    
    <div class="form-group">
    <img width="100px" src="../images/<?php echo $post_image; ?>">
    <label for="post_image">Post Image</label>
    
    <input type="file" name="post_image" id="postImg">
    <script>
        
        var input=document.querySelector("#postImg");
        input.addEventListener("click",
                              function(){
        const postImageFile=input.files.name;
        if(postImageFile){   const imgURL=URL.createObjectURL(postImageFile);
            var imgTag=document.createElement("img");
            imgTag.width="50px";
            imgTag.src=imgURL;}
       
      
        });
        
        
       
        </script>
    </div>
    
    
    <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
    </div>
    
    <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea type="text" class="form-control" cols="30" rows="10" name="post_content">
       <?php echo $post_content; ?>
        </textarea>
    </div>
    
    <div class="form-group">
     <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
</form>





