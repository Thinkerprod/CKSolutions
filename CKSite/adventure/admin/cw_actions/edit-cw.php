<?php 

include_once "../../php_util/db.php";
include_once "../../cw/cw_read_write.php";

if(isset($_POST['submitBtn'])){

    $update_cw_stmt->bind_param("issssi",$cw_type,$cw_title,$cw_date,$cw_trunc,$cw_filename,$cw_id);

    $cw_id=$_POST['cw_id'];
    $cw_type=$_POST['type_input'];
    $cw_title=$_POST['cw_title'];
    $cw_content=$_POST['cw_content'];
    $cw_trunc_temp=$_POST['cw_trunc'];
    $cw_trunc_temp=mysqli_escape_string($connection,$cw_trunc_temp);
    $old_filename=$_POST['old_filename'];
    $old_filepath="../../cw/".$old_filename;
    unlink($old_filepath);
    $cw_filename="cw-".str_replace(" ","",$cw_title).".txt";
    $filepath="../../cw/".$cw_filename;
    $cw_trunc=substr($cw_trunc_temp,0,350);
    
    $datetime=new DateTime("America/Regina");
    $cw_date=$datetime->format("Y-m-d h:i:s");

    create_writing($filepath,$cw_content);

    $update_cw_stmt->execute();
    $update_cw_stmt->close();

    check_cw_genres_update($connection,$CW_genre_id_delete_WITH_CW_stmt,$CW_genre_id_create_stmt,$cw_id);
    check_cw_tags_update($connection,$CW_tag_id_delete_BY_CW_stmt,$CW_tag_id_create_stmt,$cw_id);

    $connection->close();
}

?>