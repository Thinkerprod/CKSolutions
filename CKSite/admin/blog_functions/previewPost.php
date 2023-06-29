<?php 
include "../../php_util/db.php";
include "../includes/previewHeader.php";

if(isset($_GET['p_id'])){
    $p_id=$_GET['p_id'];
}

$query="SELECT * FROM posts WHERE post_id=".$p_id;

$preview_query=mysqli_query($connection,$query);
confirmQuery($preview_query);

while($row=mysqli_fetch_assoc($preview_query)){

    $post_cat_id=$row['post_category_id'];
    $post_title=$row['post_title'];
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_comment_count'];
    $post_status=$row['post_status'];
}

if($post_cat_id==1){
    $img_src="../../business/images/blogImages/".$post_image;
}
else{
    $img_src="../../adventure/images/blogImages/".$post_image; 
}

$preview="<div class='container'>
<h2>".$post_title."</h2>
<h3>".$post_author."</h3>
<small>Submitted on ".$post_date."</small>
<div class='post-preview'>


<img src='{$img_src}' alt='post image filename is ".$post_image."'>
    <p class='content-container'>
".$post_content."
    </p>


</div>
<div class='extra-info'>
<h3>".$post_tags."</h3>
<h3>Status: ".$post_status." </h3>
</div>

<div class='submit-container'>";

if($post_status!='published'){
    $preview.="<a href='publishPost.php?p_id=".$p_id."'>Publish Post</a>";
}

$preview.="<a href='editPost.php?p_id=".$p_id."'>Edit Post</a>
</div>
</div>";

echo $preview;

?>

</body>
</html>

