<?php 
include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){

    $update_post_stmt->bind_param("ssssii", $post_title, $post_date, $image, $post_content, $post_category_id, $post_id);
    $post_id = $_POST['post_id'];
    $post_title       =$_POST['post_title'];
    $post_category_id    =$_POST['catSelect'];
    // $update_date        =$_POST['update_date'];
    // $post_image_temp=$_FILES['update_image']['tmp_name'];
    $post_content     =$_POST['post_content'];
    // $update_tags        =$_POST['update_tags'];


    $post_content=nl2br($post_content);
    $post_content=htmlspecialchars($post_content);
// if(isset($_POST['old_image'])){
//     $image=$_POST['old_image'];
//     // echo "arrrrg";
// }

if (!file_exists($_FILES['update_image']['tmp_name']) || !is_uploaded_file($_FILES['update_image']['tmp_name'])) 
{

    $image=$_POST['old_image'];
}
else
{
    // Your file has been uploaded
        $post_image_temp=$_FILES['update_image']['tmp_name'];
    $image=$_FILES['update_image']['name'];
    // $image =$_POST['update_image']; 
    echo "arrrrg";
        $moveImgPath="../../images/blog_post_cover/".$image;
        move_uploaded_file($post_image_temp,$moveImgPath);
}



    $datetime=new DateTime("America/Regina");
    $post_date=$datetime->format("Y-m-d h:i:s");
    echo $post_date;
    // $updateQuery=mysqli_query($connection,$query);
    $update_post_stmt->execute();
    confirmQuery($update_post_stmt);
    check_tags_update($connection,$update_tag_stmt,$post_id);
$connection->close();
    // header('Location:../../admin');

    header("Location: ../admin-index.php");
}



?>