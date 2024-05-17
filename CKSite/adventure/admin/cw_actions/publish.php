<?php 

include_once "../../php_util/db.php";

if(isset($_POST['submitBtn'])){
    $publish_cw_stmt->bind_param("ii",$publish,$cw_id);
    $publish=1;
    $cw_id=$_POST['cw_id'];
    $publish_cw_stmt->execute();
    $publish_cw_stmt->close();
    $connection->close();

}


?>