<?php

$db['db_host']='localhost';
$db['db_user']='root';
$db['db_pass']='';
$db['db_name']='ck_db';

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
  else{return true;}
}

// http_response_code(404);
// include('my_404.php');
// die();

$post_tag_stmnt=$connection->prepare("INSERT INTO post_tags_ids (tag_post_id,tag_id) VALUES (?,?)");

$update_tag_stmt=$connection->prepare("UPDATE post_tags_ids SET tag_post_id=?, tag_id=?");



function check_tags($connection, $stmnt){
$last_id_query="SELECT LAST_INSERT_ID()";
$result=mysqli_query($connection,$last_id_query);
if(confirmQuery($result)){
  $row = mysqli_fetch_array($result);
  $last_inserted_id = $row[0];

 
}
  $tag_query="SELECT * FROM post_tags";
    $result=mysqli_query($connection,$tag_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $tag_id=$row['tag_id'];
            // $tag_name=$row['tag_name'];

            $check_name=$tag_id."-check";

          if(isset($_POST[$check_name])){
            $stmnt->bind_param("ii",$last_inserted_id,$tag_id);
            $stmnt->execute();
          }

        }

    }
}

function check_tags_update($connection, $stmnt,$post_id){

    $tag_query="SELECT * FROM post_tags";
      $result=mysqli_query($connection,$tag_query);
      if(confirmQuery($result)){
          while($row=mysqli_fetch_assoc($result)){
              $tag_id=$row['tag_id'];
              // $tag_name=$row['tag_name'];
  
              $check_name=$tag_id."-check";
  
            if(isset($_POST[$check_name])){
              $stmnt->bind_param("ii",$post_id,$tag_id);
              $stmnt->execute();
            }
  
          }
  
      }
  }

$post_create_stmt=$connection->prepare("INSERT INTO posts (post_title, post_date, post_image, post_content, post_category_id) VALUES (?,?,?,?,?)");
$update_post_stmt=$connection->prepare("UPDATE posts SET post_title=?, post_date=?, post_image=?, post_content=?, post_category_id=? WHERE post_id=?");



?>