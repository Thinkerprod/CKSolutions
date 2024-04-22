<?php

include_once "php_util/db.php";


if(isset($_POST['submitBtn'])){

    
}

$post_create_stmt->bind_param("sss", $post_title, $post_date, $post_image, $post_content, $post_category);



?>