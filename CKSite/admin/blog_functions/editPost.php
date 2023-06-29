<?php 
include "../../php_util/db.php";
include "../includes/editpost_header.php";


$query="SELECT * FROM categories";
$categoriesQuery=mysqli_query($connection,$query);
$options='';
while($row=mysqli_fetch_assoc($categoriesQuery)){
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];

    $options.='<option value="'.$cat_id.'">'.$cat_title.'</option>';

}




if(isset($_GET['p_id'])){

$post_id=$_GET['p_id'];




$query="SELECT * FROM posts WHERE post_id=".$post_id;

$post_edit_query=mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($post_edit_query)){
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

    $query="SELECT * FROM categories WHERE cat_id=".$post_cat_id;
$specificcategoriesQuery=mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($specificcategoriesQuery)){
    $specific_cat_id=$row['cat_id'];
    $specific_cat_title=$row['cat_title'];
}

if($specific_cat_id==1){
    $src="../../business/images/blogImages/".$post_image;
}
else{
    $src="../../adventure/images/blogImages/".$post_image;
}
    $edit_post_form='<div class="update-post-container" id="updatePostPop">

    <h2>Update Post</h2>
    <form action="" class="update-form" method="post" id="updatePostForm" enctype="multipart/form-data">
        <label for="update_title">Post Title</label>
      <input type="text" name="update_title" value="'.$post_title.'">
      <label for="update_category">Pick Category (was '.$specific_cat_title.' )</label>
      <select name="update_category" id="update_category">'.$options.'</select>
      <script>
      $(function(){

        $("#category").val("'.$specific_cat_id.'").change()

      })
      </script>
      <label for="update_date">Date</label>
      <input type="date" name="update_date" value="'.$post_date.'">
      <label for="update_image">Choose Image</label>
      <input type="file" name="update_image" id="pimage" >
      <img width="100px" src="'.$src.'">


      <label for="update_content">Content</label>
      <textarea type="text" name="update_content" rows="10" cols="45" form="updatePostForm" >'.$post_content.'</textarea>
      <label for="update_tags">Tags</label>
      <input type="text" name="update_tags" value="'.$post_tags.'">
      
      <input type="submit" value="Create Blog Post" name="update_post" id="update_Btn">
    </form>
</div>';
echo $edit_post_form;
}



}

?>

<!-- <script type="typescript/javascript">
        
        var input=document.querySelector("#pimg");
        input.addEventListener("click", function(){
        const postImageFile=input.files.name;
        if(postImageFile){const imgURL=URL.createObjectURL(postImageFile);
            var imgTag=document.createElement("img");
            imgTag.width="50px";
            imgTag.height="50px";
            imgTag.src=imgURL;}
       
      
        });
        
        
       
        </script> -->

</body>
</html>

<?php 

if(isset($_POST['update_post'])){

    $update_title       =$_POST['update_title'];
    $update_category    =$_POST['update_category'];
    $update_date        =$_POST['update_date'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];
    $update_content     =$_POST['update_content'];
    $update_tags        =$_POST['update_tags'];

if(isset($_POST['update_image'])){
    $image =$_POST['update_image']; 
    if($post_category_id!=1){
        $moveImgPath="../../adventure/images/blogImages/".$image;
        move_uploaded_file($post_image_temp,$moveImgPath);
        // $imgPath="images/blogImages/".$post_image;
    }

    else{
        $moveImgPath="../../business/images/blogImages/".$image;
        move_uploaded_file($post_image_temp, $moveImgPath);
    }
}
else{
    $image=$post_image;
}
    $query="UPDATE posts SET ";
    $query .="post_category_id='{$update_category}',";
    $query .="post_title= '{$update_title}',";
    
    $query .="post_author='Cory Kutschker',";
    $query .="post_date='{$update_date}',";
    $query .="post_image='{$image}',";
    $query .="post_content='{$update_content}',";
    $query .="post_tags='{$update_tags}',";
    $query .="post_status='draft' ";
    $query .="WHERE post_id='{$post_id}' "; 
    

    
    $updateQuery=mysqli_query($connection,$query);
    
    confirmQuery($updateQuery);

    header('Location:../../admin');


}

?>