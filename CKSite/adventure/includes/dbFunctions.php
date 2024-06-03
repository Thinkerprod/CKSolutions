<?php 
include_once "php_util/db.php";
include_once "cw/cw_read_write.php";

// function sort_content($content){


    
// }

function display_gallery_info_lg($id,$stmt){

    $card="";
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt_results=$stmt->get_result();
while($row=$stmt_results->fetch_assoc()){
    $g_title=$row['gallery_title'];
    $g_BL_check=$row['is_blacklight'];
    $g_year=$row['gallery_year'];
    $g_image=$row['gallery_image'];
    $g_BL_image=$row['gallery_BL_image'];
    $size_amount=$row['size_amount'];
    $g_orient=$row['gallery_orientation'];
    $media_type=$row['media_type'];
    $mat_type=$row['mat_type'];

}
}
?>


