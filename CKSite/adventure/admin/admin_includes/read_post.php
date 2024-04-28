<?php 
include_once "../php_util/db.php";

if(isset($_GET['p_id'])){

    $post_read_stmt->bind_param("i",$post_id);
    $post_id=$_GET['p_id'];
    $post_read_stmt->execute();

    $post_result = $post_read_stmt->get_result();

    // $result->fetch_assoc();
    $post_category_id="";
    while($post_row=$post_result->fetch_assoc()){
        $post_title = $post_row['post_title'];
        $post_date = $post_row['post_date'];
        $post_image = $post_row['post_image'];
        $post_content = $post_row['post_content'];
        $post_category_id = $post_row['post_category_id'];
        $post_comment_count = $post_row['post_comment_count'];
        $post_published = $post_row['post_published'];

        echo "<div class='row d-flex justify-content-start px-5'>
    
        <div class='col-12 my-3'>
            <h2 class='display-5 px-5 py-5'>{$post_title}</h2>
            <div class='author px-5'>
            <img src='../images/Cory-Profile.jpg' alt='a picture of the author'>
            <small class='fst-italic px-1'>written by Cory Kutschker</small>
            </div>
            
            
        </div>
 
        <div class='col-12'>
            <div class='d-flex flex-column justify-content-start px-5'>{$post_content}</div>
        </div>
        
    </div>";
    }  
    $foot="<div class='row px-5 mx-5'>";
    $foot.="<div class='col-3'><i class='fa-solid fa-share-nodes'></i></div>";

    $foot.="<div class='col-3'>
    <p>{$post_comment_count} Comments</p>
</div>";

    $post_result->free();

    $cat_read_stmt->bind_param("i",$post_category_id);
   
    $cat_read_stmt->execute();

    $cat_result = $cat_read_stmt->get_result();

    while($cat_row=$cat_result->fetch_assoc()){
        $cat_title=$cat_row['cat_title'];

        $foot.= "<div class='col-3'>
        <p>{$cat_title}</p>
    </div>";
    }

    $cat_result->free();

    $post_tag_read_id_stmt->bind_param("i",$post_id);
    
    $post_tag_read_id_stmt->execute();

    $result = $post_tag_read_id_stmt->get_result();
    $tag_string="";
    while($row=$result->fetch_assoc()){
        $tag_string.="#".$row['tag_name']."";
    }

    $foot.="<div class='col-3'>
    <p>{$tag_string}</p>
</div>";

echo $foot;


    $result->free();
    $connection->close();
}


?>
