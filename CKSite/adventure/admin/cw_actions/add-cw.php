<?php 
include_once "../../php_util/db.php";
include_once "../../cw/cw_read_write.php";

if(isset($_POST['submitBtn'])){
    $cw_create_stmt->bind_param("sss",$cw_title,$cw_date,$cw_filename);
$cw_title=$_POST['cw_title'];
$cw_title=mysqli_escape_string($connection,$cw_title);
$cw_content=$_POST['cw_content'];

$cw_filename="cw-".trim($cw_title);

$datetime=new DateTime("America/Regina");
$cw_date=$datetime->format("Y-m-d h:i:s");
$cw_create_stmt->execute();
check_cw_genres($connection,$CW_genre_id_create_stmt);
check_cw_tags($connection,$CW_tag_id_create_stmt);
create_writing($cw_filename,$cw_content);
$connection->close();

}

?>