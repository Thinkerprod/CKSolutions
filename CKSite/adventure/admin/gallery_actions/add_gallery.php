<?php 
include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $gallery_title=$_POST['gallery_title'];
    $media_select=$_POST['gallery_title'];

    if(isset($_POST['black_check'])){
        $black_check=$_POST['black_check'];
        $gallery_create_BL_stmt->bind_param("siisiiss",$gallery_title,$media_select,$black_check,$size_input,$year_input,$material_select,$image_input,$image_input_BL);
    }
    else{
        $black_check=0;
    }

    
    $size_input=$_POST['gallery_title'];
    $year_input=$_POST['gallery_title'];
    $material_select=$_POST['gallery_title'];
    $image_input=$_POST['gallery_title'];
    $image_input_BL=$_POST['gallery_title'];

    $image_input=$_FILES['image_input']['name'];
    $image_input_temp=$_FILES['image_input']['tmp_name'];

    $image_input_BL=$_FILES['image_input_BL']['name'];
    $image_input_BL_temp=$_FILES['image_input_BL']['tmp_name'];

    $moveImgPath="../../images/gallery/".$image_input;
    move_uploaded_file($image_input_temp,$moveImgPath);

    $moveImgBLPath="../../images/gallery/".$image_input_BL;
    move_uploaded_file($image_input_BL_temp,$moveImgBLPath);

}

?>