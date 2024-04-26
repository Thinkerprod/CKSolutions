<?php 

if(isset($_GET['p_id'])){
    $post_id=$_GET['p_id'];

   $result = select_post_id($connection,$post_id);

   if(confirmQuery($result)){
    while($row=mysqli_fetch_assoc($result)){
        // $post_id=$row['post_id'];       
$post_title=$row['post_title'];

$post_date=$row['post_date'];
$post_content=$row['post_content'];
$post_image=$row['post_image'];
$src="../images/blog_post_cover/".$post_image;
$post_category_id=$row['post_category_id'];
$post_comment_count=$row['post_comment_count'];
// $post_published=$row['post_published'];
// echo $post_image;
echo "
<div class='row'>
        <div class='col-12 '>
            <h1 class='display-4'>Edit Blog Post</h1>

            <form action='blog_actions/edit-post.php' method='post' enctype='multipart/form-data'>
            <input type='hidden' name='post_id' value='{$post_id}'>
            <div class='row mb-3'>
                <div class='col-12'>
                    <h6>Categories</h6>
                </div>
                <div class='col-6'>";
                 category_Selected($connection,$post_id);
                echo "</div>
                
            </div>
            <div class='row mb-3'>
                <div class='col-12'>
                    <h6>Tags</h6>
                </div>
                <div class='col-8'>";
                tags_Checkbox_Checked($connection,$post_id);
                echo "</div>
                <div class='col-12 mb-3'>
                    <label for='img_input' class='form-label'>Choose Cover Image</label>
                    <input type='hidden' name='old_image' value='{$post_image}'>
                    <input type='file' name='update_image' id='' class='form-control'>
                    
                    <img width='100px' src='".$src."'>
                </div>
                    
                
            </div>

        </div>
        <div class='col-12'>

                <div class='mb-3'>
                    <label class='form-label' for='post_title'>Title</label>
                    <input class='form-control' type='text' name='post_title' id='' value='".$post_title."'>
                </div>
                <div class='mb-3'>
                    <textarea class='form-control' name='post_content' id='' cols='70' rows='30'>".$post_content."</textarea>
                </div>
                <div class='mb-3'>
                    <input class='btn btn-primary' type='submit' value='Submit' name='submitBtn'>
                </div>
            </form>
        </div>
    </div>";
    }
   }


}




?>



