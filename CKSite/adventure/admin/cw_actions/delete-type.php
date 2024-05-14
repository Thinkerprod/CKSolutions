<?php 

include_once "../../php_util/db.php";

if(isset($_GET['t_id'])){
    $t_id=$_GET['t_id'];
}


$cw_type_delete_stmt->bind_param("i",$t_id);
$cw_type_delete_stmt->execute();
$cw_type_delete_stmt->close();

$connection->close();
header("Location: ../admin-index.php");

?>