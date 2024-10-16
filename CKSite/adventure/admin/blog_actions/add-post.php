<?php

include_once "../../php_util/db.php";


if(isset($_POST['submitBtn'])){
    $post_create_stmt->bind_param("sssssi", $post_title, $post_date, $post_image, $post_content, $post_trunc, $post_category_id);
    $post_category_id=$_POST['catSelect'];
    echo $post_category_id;
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];

    $moveImgPath="../../images/blog_post_cover/".$post_image;
    move_uploaded_file($post_image_temp,$moveImgPath);

    $post_title=$_POST['post_title'];
    $post_title=mysqli_escape_string($connection,$post_title);

    $post_content=$_POST['post_content'];
    $post_trunc=$_POST['post_trunc'];
    $post_trunc=substr($post_trunc,0,350);

    //tag input separate from checkboxes
    if(isset($_POST['quick_tag'])){
        $tag_name=$_POST['quick_tag'];

        $tag_stmt->bind_param("s",$tag_name);
        $tag_stmt->execute();

        $datetime=new DateTime("America/Regina");
        $post_date=$datetime->format("Y-m-d h:i:s");
    
        $post_create_stmt->execute();
        check_tags_added_input($connection,$post_tag_stmnt,$tag_name);
        confirmQuery($post_create_stmt);
        $connection->close();
            header('Location:../admin-index.php');
    }
    else{
        $datetime=new DateTime("America/Regina");
        $post_date=$datetime->format("Y-m-d h:i:s");
    
        $post_create_stmt->execute();
        check_tags($connection,$post_tag_stmnt);
        confirmQuery($post_create_stmt);
        $connection->close();
            header('Location:../admin-index.php');
    }


// $post_content=nl2br($post_content);
// $post_content=htmlspecialchars($post_content);
// $post_content=mysqli_escape_string($connection,$post_content);
    // date_default_timezone_set("America/Regina");
    // $date=date("d-m-Y H:i:s");


}





?>