<?php 
include_once "../php_util/db.php";

if(isset($_GET['p_id'])){

    $post_read_stmt->bind_param("i",$post_id);
    $post_id=$_GET['p_id'];
    $post_read_stmt->execute();

    $result = $post_read_stmt->get_result();

    // $result->fetch_assoc();

    while($row=$result->fetch_assoc()){
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_category_id = $row['post_category_id'];
        $post_comment_count = $row['post_comment_count'];
        $post_published = $row['post_published'];


    }






    

}


?>

<div class="row">
    
    <div class="col-12">
        <h2 class="display-4">{$post_title}</h2>
    </div>
</div>