<?php 
include "../../php_util/db.php";
    if(isset($_POST['create_post'])){
//Add to Posts
$is_cw=$_POST['is_creative_writing'];
echo $is_cw;
if($is_cw==0){

     $post_title=mysqli_real_escape_string($connection, $_POST['post_title']);
     $post_category_id=$_POST['post_category'];
     $post_image=$_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];
     $post_date=$_POST['post_date'];
     $post_content=mysqli_real_escape_string($connection, $_POST['post_content']);
     $post_tags=$_POST['post_tags'];
     $post_comment_count=0;
    $post_status="draft";
    $post_author="Cory Kutschker";

    

    if($post_category_id!=1){
        $moveImgPath="../../adventure/images/blogImages/".$post_image;
        move_uploaded_file($post_image_temp,$moveImgPath);
        // $imgPath="images/blogImages/".$post_image;
    }

    else{
        $moveImgPath="../../business/images/blogImages/".$post_image;
        move_uploaded_file($post_image_temp, $moveImgPath);
    }

    

    $query="INSERT INTO posts (post_category_id, post_title, post_author, post_date,post_image, post_content, post_tags, post_comment_count, post_status) 
    VALUES({$post_category_id},'{$post_title}','{$post_author}', '{$post_date}','{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";
     $addQuery=mysqli_query($connection,$query);
     confirmQuery($addQuery);
     header("Location: ../../admin");
    }
else{

//add to cw
    $writing_title=$_POST['post_title'];
    $writing_genre_id=$_POST['genre_select'];
    $writing_date=$_POST['post_date'];
    $writing_content=$_POST['post_content'];
    $writing_tags=$_POST['post_tags'];
    $writing_comment_count=0;
   $writing_status="draft";
   $writing_author="Cory Kutschker";

   $query="INSERT INTO cw ('writing_title', 'writing_author', 'writing_genre_id', 'writing_date', 'writing_content', 'writing_comment_count', 'writing_tags', 'writing_status') 
   VALUES ('{$writing_title}', '{$writing_author}', '{$writing_genre_id}', '{$writing_date}', '{$writing_content}', '{$writing_comment_count}', '{$writing_tags}', '{$writing_status}')";
    $add_cw_post=mysqli_query($connection,$query);
       confirmQuery($add_cw_post);
       header("Location: ../../admin");
}


}




?>