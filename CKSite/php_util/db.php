<?php

$db['db_host']='localhost';
$db['db_user']='root';
$db['db_pass']='';
$db['db_name']='cms';

foreach($db as $key => $value){
    define(strtoupper($key),$value);
}


// Create connection
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

function confirmQuery($result){
  global $connection;

  if(!$result){
      die('Query Failed '. mysqli_error($connection));
  }
}


?>