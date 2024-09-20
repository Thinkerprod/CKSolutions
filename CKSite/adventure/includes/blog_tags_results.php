<?php 

include_once "php_util/db.php";

if(isset($_GET['tag'])){
    $tag_id=$_GET['tag'];


}

$post_tag_read_stmt->bind_param('i',$tag_id);
$post_tag_read_stmt->execute();
$tag_results=$post_tag_read_stmt->get_result();
while($post_row=$tag_results->fetch_assoc()){

$post_tag_read_id_stmt->bind_param('i',$post_id);
$post_tag_read_id_stmt->execute();
$tag_string="";
$tag_result=$post_tag_read_id_stmt->get_result();
while($tag_row=$tag_result->fetch_assoc()){
    $tag_name=$tag_row['tag_name'];
    $tag_string.="#".$tag_name;
}


    $post_id=$post_row['post_id'];
    $post_title=$post_row['post_title'];
    $post_date=$post_row['post_date'];
    $post_image=$post_row['post_image'];
    $post_content=$post_row['post_content'];
    $cat_title=$post_row['cat_title'];

    $post_trunc=substr($post_content,0,350)."...";

$datetime_date=date_create($post_date);
$formatted_date=date_format($datetime_date,"D d F Y");
    
$img_src="images/blog_post_cover/".$post_image;


$posts_string.=" <div class='card-container d-flex justify-content-center align-items-center '>
<a class='text-decoration-none' href='blog-adventure.php?src=read&p_id={$post_id}' >


<div class='card mb-3'>
    <div class='row g-0'>
        <div class='col-md-4'>
            <img src='{$img_src}' alt='cover image for the post {$img_src}' class='img-fluid rounded-start'>
        </div>
        <div class='col-md-8 d-flex align-items-center'>
            <div class='card-body'>
                <h5 class='card-title display-6'>
                {$post_title}
                </h5>
                <p class='card-text'>
                {$post_trunc}
                </p>
                <small class='card-text text-body-secondary fst-italic'>
                {$formatted_date}
                </small>
            </div>
        </div>
        <div class='card-footer d-flex justify-content-between align-items-center px-3'>
            <div class='category'>{$cat_title}</div>
            <div class='tags'>{$tag_string}</div>
        </div>
    </div>
</div></a>
</div>
";
echo $posts_string;
}


?>