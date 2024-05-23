<?php 
include_once "../../php_util/db.php";

if(isset($_GET['g_id'])){
$g_id=$_GET['g_id'];
$gallery_read_stmt->bind_param("i",$g_id);
$gallery_read_stmt->execute();
$read_results=$gallery_read_stmt->get_result();
while($read_row=$read_results->fetch_assoc()){
    $black_check=$read_row['is_blacklight'];
    $image=$read_row['gallery_image'];
    $image_BL=$read_row['gallery_BL_image'];


    if($black_check==1){
        $filepath="../../images/gallery/".$image_BL;
        unlink($filepath);
    }

    $filepath="../../images/gallery/".$image;
    unlink($filepath);
}




$gallery_read_stmt->close();
    $gallery_delete_stmt->bind_param("i",$g_id);
    $gallery_delete_stmt->execute();
    $gallery_delete_stmt->close();
    $connection->close();

    echo "success!";

    header("Location:../admin-index.php");

}


?>