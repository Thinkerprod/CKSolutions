<?php 
include_once "../../php_util/db.php";
// include_once "../admin_includes/db_classes.php";


if(isset($_POST['submitBtn'])){
    $gallery_id=$_POST['gallery_id'];
    $gallery_title=$_POST['gallery_title'];
    $media_select=$_POST['media_input'];

    if(isset($_POST['black_check'])){
        $black_check=1;
        echo $black_check."  sehhnhrhhrgr";
        $gallery_update_BL_stmt->bind_param("siisiissi",$gallery_title,$media_select,$black_check,$size_input,$year_input,$material_select,$image_input,$image_input_BL,$gallery_id);
    }
    else{
        $black_check=0;
        echo $black_check." bleh";
        $gallery_update_stmt->bind_param("siisiisi",$gallery_title,$media_select,$black_check,$size_input,$year_input,$material_select,$image_input,$gallery_id);
    }

    $size_input=$_POST['size_input'];
    $year_input=$_POST['year_input'];
    $material_select=$_POST['mat_input'];

    if (!file_exists($_FILES['image_input']['tmp_name']) || !is_uploaded_file($_FILES['image_input']['tmp_name'])) 
{
//nothing legit is put into the file input
    $image_input=$_POST['old_image'];
}
else
{
    // Your file has been uploaded
        $gallery_image_temp=$_FILES['image_input']['tmp_name'];
    $image_input=$_FILES['image_input']['name'];
 
    echo "arrrrg";
        $moveImgPath="../../images/gallery/".$image_input;
        move_uploaded_file($gallery_image_temp,$moveImgPath);
}

if($black_check==1){

    if (!file_exists($_FILES['image_input_BL']['tmp_name']) || !is_uploaded_file($_FILES['image_input_BL']['tmp_name'])) 
    {

        $image_input_BL=$_POST['old_image_BL'];
    }
    else
    {
    // Your file has been uploaded
        $gallery_image_BL_temp=$_FILES['image_input_BL']['tmp_name'];
    $image_input_BL=$_FILES['image_input_BL']['name'];
    // $image =$_POST['update_image']; 
    echo "arrrrg";
        $moveImgPath="../../images/gallery/".$image_input_BL;
        move_uploaded_file($gallery_image_BL_temp,$moveImgPath);
    }





    $gallery_update_BL_stmt->execute();
    $gallery_update_BL_stmt->close();
}
else{
    $gallery_update_stmt->execute();
    $gallery_update_stmt->close();
}

$connection->close();

echo "successful";

header("Location:../admin-index.php");

}



?>