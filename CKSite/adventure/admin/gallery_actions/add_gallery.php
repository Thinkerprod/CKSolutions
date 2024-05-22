<?php 
include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $gallery_title=$_POST['gallery_title'];
    $media_select=$_POST['media_select'];

    if(isset($_POST['black_check'])){
        $black_check=1;
        echo $black_check."  sehhnhrhhrgr";
        $gallery_create_BL_stmt->bind_param("siisiiss",$gallery_title,$media_select,$black_check,$size_input,$year_input,$material_select,$image_input,$image_input_BL);
    }
    else{
        $black_check=0;
        echo $black_check." bleh";
        $gallery_create_paint_stmt->bind_param("siisiis",$gallery_title,$media_select,$black_check,$size_input,$year_input,$material_select,$image_input);
    }

    
    $size_input=$_POST['size_select'];
    $year_input=$_POST['year_input'];
    $material_select=$_POST['material_select'];
    // $image_input=$_POST['gallery_title'];
    // $image_input_BL=$_POST['gallery_title'];

    $image_input=$_FILES['image_input']['name'];
    $image_input_temp=$_FILES['image_input']['tmp_name'];

        $moveImgPath="../../images/gallery/".$image_input;
    move_uploaded_file($image_input_temp,$moveImgPath);

    if($black_check==1){
        $image_input_BL=$_FILES['image_input_BL']['name'];
        $image_input_BL_temp=$_FILES['image_input_BL']['tmp_name'];

        $moveImgBLPath="../../images/gallery/".$image_input_BL;
        move_uploaded_file($image_input_BL_temp,$moveImgBLPath);
        $gallery_create_BL_stmt->execute();
        $gallery_create_BL_stmt->close();
    }
    else{
        $gallery_create_paint_stmt->execute();
        $gallery_create_paint_stmt->close();
    }

    echo "successful";






}

?>