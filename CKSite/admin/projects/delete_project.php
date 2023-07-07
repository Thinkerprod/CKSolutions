<?php 
include "../../php_util/db.php";
include "../includes/addProjects_Header.php";

if(isset($_GET['p_id'])){
   $p_id = $_GET['p_id'];

   $query="DELETE * FROM projects WHERE proj_id=".$p_id;
   $delete_Query=mysqli_query($connection,$query);
    confirmQuery($delete_Query);

   }



?>