<?php 
include_once "php_util/db.php";

$view_all_posts_query="SELECT * FROM posts WHERE post_published=1";
$view_posts=mysqli_query($connection,$view_all_posts_query);
$post_card="";
while($row=mysqli_fetch_assoc($view_posts)){
    $post_id=$row['post_id'];
    $post_title=$row['post_title'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];
    $post_category_id=$row['post_category_id'];

    $datetime_date=date_create($post_date);
    $formatted_date=date_format($datetime_date,"D d F Y");

    $post_trunc=substr($post_content,0,350)."...";

    $cat_read_stmt->bind_param("i",$post_category_id);
    $cat_read_stmt->execute();
    $cat_results=$cat_read_stmt->get_result();
    $row=$cat_results->fetch_assoc();

    $cat=$row['cat_title'];

    $post_tag_read_id_stmt->bind_param("i",$post_id);
    $post_tag_read_id_stmt->execute();
    $tag_results=$post_tag_read_id_stmt->get_result();
    $tag_string="";
    while($tag_row=$tag_results->fetch_assoc()){
        $tag="#";
        $tag.=$tag_row['tag_name'];
        $tag_string.=$tag." ";
    }

    $img_src="images/blog_post_cover/".$post_image;

$post_card.="
 <div class='card-container d-flex justify-content-center align-items-center '>
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
                <div class='category'>{$cat}</div>
                <div class='tags'>{$tag_string}</div>
            </div>
        </div>
    </div></a>
</div>
";

}

echo $post_card;

?>



<!-- <div class='card-container d-flex justify-content-center align-items-center '>

    <a href='blog-adventure.php?src=read&p_id={$post_id} >
    <div class='card mb-3'>
        <div class='row'>
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
    <div class='card-footer d-flex justify-content-between mx-3'>
        <div class='category'>{$cat}</div>
        <div class='tags'>{$tag_string}</div>
    </div>
</div></a>


</div> -->