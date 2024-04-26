<?php

include_once "../../php_util/db.php";


if(isset($_POST['submitBtn'])){
    $post_create_stmt->bind_param("ssssi", $post_title, $post_date, $post_image, $post_content, $post_category_id);
    $post_category_id=$_POST['catSelect'];
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];

    $moveImgPath="../../images/blog_post_cover/".$post_image;
    move_uploaded_file($post_image_temp,$moveImgPath);

    $post_title=$_POST['post_title'];

    $post_content=$_POST['post_content'];

    // date_default_timezone_set("America/Regina");
    // $date=date("d-m-Y H:i:s");
    $datetime=new DateTime("America/Regina");
    $post_date=$datetime->format("Y-m-d h:i:s");

    $post_create_stmt->execute();
    check_tags($connection,$post_tag_stmnt);
    confirmQuery($post_create_stmt);
    $connection->close();
        // header('Location:../../admin');

}





?>