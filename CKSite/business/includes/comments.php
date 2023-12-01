<?php 


include "../../php_util/db.php";
include "blog-functions.php";


//creating a comment
if(isset($_POST['btn-submit'])){
createComment($connection);
}

if(isset($_GET['op_com_id'])){
    createReply($connection);
}

?>