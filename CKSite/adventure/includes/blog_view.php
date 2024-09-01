<?php 
include_once "php_util/db.php";


if(isset($_GET['p_id'])){
    $post_id=$_GET['p_id'];
}

$post_read_stmt->bind_param('i',$post_id);
$post_read_stmt->execute();
$read_result=$post_read_stmt->get_result();
while($post_row=$read_result->fetch_assoc()){
    $post_title=$post_row['post_title'];
    $post_date=$post_row['post_date'];
    $post_content=$post_row['post_content'];
    $post_category_id=$post_row['post_category_id'];

}

// $read_result->free();

$cat_read_stmt->bind_param('i',$post_category_id);

$cat_read_stmt->execute();
$cat_results=$cat_read_stmt->get_result();

while($cat_row=$cat_results->fetch_assoc()){
    $category=$cat_row['cat_title'];
}

// $cat_results->free();

$post_tag_read_id_stmt->bind_param('i',$post_id);

$post_tag_read_id_stmt->execute();
$tag_results=$post_tag_read_id_stmt->get_result();

$tag_string="";
while($tag_row=$tag_results->fetch_assoc()){
    $tag_string.="#".$tag_row['tag_name'];

}

$post_string=
"<div class='container-fluid d-flex flex-column align-items-center'>
    <div class='post-info d-flex flex-column align-items-center'>
        <h1 class='display-3'>{$post_title}</h1>
        <div class='author d-flex justify-content-center align-items-center my-3'>
            <img src='images/Cory-profile.jpg' alt='image of the author'>
            <small class='fst-italic mx-2'>Written by Cory Kutschker <br> on {$post_date}</p>
        </div>
    </div>
    <div class='container-fluid post-content p-3 fs-5 fst-normal'>
        {$post_content}
    </div>
    <div class='post-footer d-flex justify-content-between fs-5 fst-normal'>
        <div class='post-share'><i class='fa-solid fa-share-nodes'></i>Share</div>
        <div class='category'>{$category}</div>
        <div class='tags'>{$tag_string}</div>
    </div>
</div>";

echo $post_string;


?>

