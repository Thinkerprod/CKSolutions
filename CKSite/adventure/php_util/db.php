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
$post_tag_read_stmt=$connection->prepare("SELECT * FROM posts WHERE post_id=?");
$update_tag_stmt=$connection->prepare("UPDATE post_tags_ids SET tag_post_id=?, tag_id=?");
$delete_post_tag_stmt=$connection->prepare("DELETE FROM post_tags_ids WHERE tag_post_id=?");

$post_tag_read_id_stmt=$connection->prepare("SELECT * FROM post_tags INNER JOIN post_tags_ids ON post_tags.tag_id=post_tags_ids.tag_id WHERE post_tags_ids.tag_post_id=?");
$post_tag_delete_tag_id_stmt=$connection->prepare("DELETE FROM post_tags_ids WHERE tag_id=?");

$tag_stmt=$connection->prepare("INSERT INTO post_tags (tag_name) VALUES (?)");
$tag_delete_stmt=$connection->prepare("DELETE FROM post_tags WHERE tag_id=?");


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


//post CRUD
$post_create_stmt=$connection->prepare("INSERT INTO posts (post_title, post_date, post_image, post_content, post_category_id) VALUES (?,?,?,?,?)");
$post_read_stmt=$connection->prepare("SELECT * FROM posts WHERE post_id=?");
$update_post_stmt=$connection->prepare("UPDATE posts SET post_title=?, post_date=?, post_image=?, post_content=?, post_category_id=? WHERE post_id=?");
$delete_post_stmt=$connection->prepare("DELETE FROM posts WHERE post_id=?");

//category CRUD
$cat_create_stmt=$connection->prepare("INSERT INTO categories (cat_title) VALUES (?)");
$cat_read_stmt=$connection->prepare("SELECT * FROM categories WHERE cat_id=?");
$cat_update_stmt=$connection->prepare("UPDATE categories SET cat_title=?");
$cat_delete_stmt=$connection->prepare("DELETE FROM categories WHERE cat_id=?");

//genre CRUD
$genre_create_stmt=$connection->prepare("INSERT INTO genre (genre_name) VALUES (?)");
$genre_read_stmt=$connection->prepare("SELECT * FROM genre WHERE genre_id=?");
$genre_update_stmt=$connection->prepare("UPDATE genre SET genre_name=?");
$genre_delete_stmt=$connection->prepare("DELETE FROM genre WHERE genre_id=?");

//cw tag CRUD
$CW_tag_create_stmt=$connection->prepare("INSERT INTO cw_tags (tag_name) VALUES (?)");
$CW_tag_read_stmt=$connection->prepare("SELECT * FROM cw_tags WHERE tag_id=?");
$CW_tag_update_stmt=$connection->prepare("UPDATE cw_tags SET tag_name=?");
$CW_tag_delete_stmt=$connection->prepare("DELETE FROM cw_tags WHERE tag_id=?");

//cw_tags_ids CRUD
$CW_tag_id_create_stmt=$connection->prepare("INSERT INTO cw_tags_ids (cw_id,tag_id) VALUES (?,?)");
$CW_tag_id_read_stmt=$connection->prepare("SELECT * FROM cw_tags_ids WHERE tag_id=?");
$CW_tag_id_update_stmt=$connection->prepare("UPDATE cw_tags_ids SET cw_id=?, tag_id=?");
$CW_tag_id_delete_stmt=$connection->prepare("DELETE FROM cw_tags_ids WHERE tag_id=?");


//media CRUD
$media_create_stmt=$connection->prepare("INSERT INTO media (media_type) VALUES (?)");
$media_read_stmt=$connection->prepare("SELECT * FROM media WHERE media_id=?");
$media_update_stmt=$connection->prepare("UPDATE media SET media_type=?");
$media_delete_stmt=$connection->prepare("DELETE FROM media WHERE media_id=?");



?>