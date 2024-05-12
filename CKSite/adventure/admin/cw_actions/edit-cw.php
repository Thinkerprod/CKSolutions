<?php 

include_once "../../php_util/db.php";
include_once "../../cw/cw_read_write.php";

if(isset($_POST['submitBtn'])){

    $update_cw_stmt->bind_param("sssi",$cw_title,$cw_date,$cw_filename,$cw_id);

    $cw_id=$_POST['cw_id'];
    $cw_title=$_POST['cw_title'];
    $cw_content=$_POST['cw_content'];
    $old_filename=$_POST['old_filename'];
    $old_filepath="../../cw/".$old_filename;
    unlink($old_filepath);
    $cw_filename="cw-".str_replace(" ","",$cw_title).".txt";
    $filepath="../../cw/".$cw_filename;
    
    
    $datetime=new DateTime("America/Regina");
    $cw_date=$datetime->format("Y-m-d h:i:s");

    create_writing($filepath,$cw_content);

    $update_cw_stmt->execute();

    check_cw_genres_update($connection,$CW_genre_id_delete_WITH_CW_stmt,$CW_genre_id_create_stmt,$cw_id);
    check_cw_tags_update($connection,$CW_tag_id_delete_BY_CW_stmt,$CW_tag_id_create_stmt,$cw_id);

    $connection->close();
}

?>