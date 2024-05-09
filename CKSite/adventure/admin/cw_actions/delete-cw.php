<?php 
include_once "../../php_util/db.php";
include_once "../../cw/cw_read_write.php";


if(isset($_GET['cw_id'])){
    $cw_id=$_GET['cw_id'];

    $CW_genre_id_delete_WITH_CW_stmt->bind_param("i",$cw_id);
    $CW_genre_id_delete_WITH_CW_stmt->execute();
    $CW_tag_id_delete_BY_CW_stmt->bind_param("i",$cw_id);
    $CW_tag_id_delete_BY_CW_stmt->execute();

    $cw_read_stmt->bind_param("i",$cw_id);
    $cw_read_stmt->execute();
    $cw_result=$cw_read_stmt->get_result();
    while($row=$cw_result->fetch_assoc()){
        $cw_filename=$row['cw_filename'];
        remove_writing($cw_filename);
    }


    $delete_cw_stmt->bind_param("i",$cw_id);
    $delete_cw_stmt->execute();
    header("Location:../admin-index.php");

}
?>