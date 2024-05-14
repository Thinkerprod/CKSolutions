<?php 
include_once "../../php_util/db.php";
include_once "../../cw/cw_read_write.php";

if(isset($_POST['submitBtn'])){
    $cw_create_stmt->bind_param("isss",$cw_type,$cw_title,$cw_date,$cw_filename);
    $cw_type=$_POST['type_input'];
$cw_title=$_POST['cw_title'];
$cw_title=mysqli_escape_string($connection,$cw_title);
$cw_content=$_POST['cw_content'];

$cw_filename="cw-".str_replace(" ","",$cw_title).".txt";

$datetime=new DateTime("America/Regina");
$cw_date=$datetime->format("Y-m-d h:i:s");

$cw_create_stmt->execute();

$last_id_query="SELECT LAST_INSERT_ID()";
$result=mysqli_query($connection,$last_id_query);
if(confirmQuery($result)){
  $row = mysqli_fetch_array($result);
  $last_inserted_id = $row[0];

 
}
$filepath="../../cw/".$cw_filename;
check_cw_genres($connection,$CW_genre_id_create_stmt,$last_inserted_id);
check_cw_tags($connection,$CW_tag_id_create_stmt,$last_inserted_id);
create_writing($cw_filename,$cw_content);
$connection->close();

}

?>