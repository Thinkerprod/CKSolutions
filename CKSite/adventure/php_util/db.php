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

  function check_cw_genres($connection, $stmnt,$last_inserted_id){


    $genre_query="SELECT * FROM genre";
    $result=mysqli_query($connection,$genre_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
          
            $genre_id=$row['genre_id'];
            $genre_name=str_replace(" ","",$row['genre_name']);

            $switch_name=$genre_name."_input";

          if(isset($_POST[$switch_name])){
          echo "statements ";
            $stmnt->bind_param("ii",$last_inserted_id,$genre_id);
            $stmnt->execute();
          }

        }

    }
  }

  function check_cw_tags($connection, $stmnt,$inserted_id){


      $tag_query="SELECT * FROM cw_tags";
        $result=mysqli_query($connection,$tag_query);
        if(confirmQuery($result)){
            while($row=mysqli_fetch_assoc($result)){
                $tag_id=$row['tag_id'];
                $tag_name=$row['tag_name'];
                $trimmed_tag_name=str_replace(" ","",$tag_name);
                // $check_name=$tag_id."-check";
    
              if(isset($_POST[$trimmed_tag_name])){
                $stmnt->bind_param("ii",$inserted_id,$tag_id);
                $stmnt->execute();
              }
    
            }
    
        }
    }


    function check_cw_genres_update($connection,$delStmt, $stmnt,$id){
      $delStmt->bind_param("i",$id);
      $delStmt->execute();

      $genre_query="SELECT * FROM genre";
      $result=mysqli_query($connection,$genre_query);
      if(confirmQuery($result)){
          while($row=mysqli_fetch_assoc($result)){
            
              $genre_id=$row['genre_id'];
              $genre_name=str_replace(" ","",$row['genre_name']);
  
              $switch_name=$genre_name."_input";
  
            if(isset($_POST[$switch_name])){
            echo "statements ";
              $stmnt->bind_param("ii",$id,$genre_id);
              $stmnt->execute();
            }
  
          }
  
      }
    }
  
    function check_cw_tags_update($connection,$delStmt, $stmnt,$id){
      $delStmt->bind_param("i",$id);
      $delStmt->execute();


      $tag_query="SELECT * FROM cw_tags";
        $result=mysqli_query($connection,$tag_query);
        if(confirmQuery($result)){
            while($row=mysqli_fetch_assoc($result)){
                $tag_id=$row['tag_id'];
                $tag_name=$row['tag_name'];
                $trimmed_tag_name=str_replace(" ","",$tag_name);
                // $check_name=$tag_id."-check";
    
              if(isset($_POST[$trimmed_tag_name])){
                $stmnt->bind_param("ii",$id,$tag_id);
                $stmnt->execute();
              }
    
            }
    
        }
    }

//post CRUD
$post_create_stmt=$connection->prepare("INSERT INTO posts (post_title, post_date, post_image, post_content, post_category_id) VALUES (?,?,?,?,?)");
$post_read_stmt=$connection->prepare("SELECT * FROM posts WHERE post_id=?");
$update_post_stmt=$connection->prepare("UPDATE posts SET post_title=?, post_date=?, post_image=?, post_content=?, post_comment_count=?, post_published=? WHERE post_id=?");
$delete_post_stmt=$connection->prepare("DELETE FROM posts WHERE post_id=?");

//category CRUD
$cat_create_stmt=$connection->prepare("INSERT INTO categories (cat_title) VALUES (?)");
$cat_read_stmt=$connection->prepare("SELECT * FROM categories WHERE cat_id=?");
$cat_update_stmt=$connection->prepare("UPDATE categories SET cat_title=?");
$cat_delete_stmt=$connection->prepare("DELETE FROM categories WHERE cat_id=?");

//CW CRUD
$cw_create_stmt=$connection->prepare("INSERT INTO cw (cw_type, cw_title, cw_date, cw_filename) VALUES (?,?,?,?)");
$cw_read_stmt=$connection->prepare("SELECT * FROM cw WHERE cw_id=?");
$update_cw_stmt=$connection->prepare("UPDATE cw SET cw_type=?, cw_title=?, cw_date=?, cw_filename=? WHERE cw_id=?");
$update_cw_comment_stmt=$connection->prepare("UPDATE cw SET cw_comment_count=? WHERE cw_id=?");
$publish_cw_stmt=$connection->prepare("UPDATE cw SET cw_published=? WHERE cw_id=?");
$delete_cw_stmt=$connection->prepare("DELETE FROM cw WHERE cw_id=?");

//type CRUD
$cw_type_create_stmt=$connection->prepare("INSERT INTO cw_types (type_name) VALUES (?)");
$cw_type_read_stmt=$connection->prepare("SELECT cw_type FROM cw WHERE cw_id=?");
$cw_type_delete_stmt=$connection->prepare("DELETE FROM cw_types WHERE type_id=?");

//genre CRUD
$genre_create_stmt=$connection->prepare("INSERT INTO genre (genre_name) VALUES (?)");
$genre_read_stmt=$connection->prepare("SELECT * FROM genre WHERE genre_id=?");

$genre_read_BY_genre_id_Join_stmt=$connection->prepare("SELECT * FROM genre INNER JOIN genre_ids ON genre.genre_id=genre_ids.genre_id WHERE genre_ids.genre_cw_id=?");

$genre_update_stmt=$connection->prepare("UPDATE genre SET genre_name=?");
$genre_delete_stmt=$connection->prepare("DELETE FROM genre WHERE genre_id=?");

//genre_ids CRUD
$CW_genre_id_create_stmt=$connection->prepare("INSERT INTO genre_ids (genre_cw_id,genre_id) VALUES (?,?)");

$genre_id_read_BY_CW_stmt=$connection->prepare("SELECT * FROM genre_ids WHERE genre_cw_id=?");
$genre_id_read_BY_Genre_stmt=$connection->prepare("SELECT * FROM genre_ids WHERE genre_id=?");



$CW_genre_id_update_stmt=$connection->prepare("UPDATE genre_ids SET genre_cw_id=?, genre_id=?");

$CW_genre_id_delete_WITH_CW_stmt=$connection->prepare("DELETE FROM genre_ids WHERE genre_cw_id=?");
$CW_genre_id_delete_WITH_GENRE_stmt=$connection->prepare("DELETE FROM genre_ids WHERE genre_id=?");

//cw tag CRUD
$CW_tag_create_stmt=$connection->prepare("INSERT INTO cw_tags (tag_name) VALUES (?)");
$CW_tag_read_stmt=$connection->prepare("SELECT * FROM cw_tags WHERE tag_id=?");
$CW_tag_update_stmt=$connection->prepare("UPDATE cw_tags SET tag_name=?");

$CW_tag_delete_stmt=$connection->prepare("DELETE FROM cw_tags WHERE tag_id=?");


//cw_tags_ids CRUD
$CW_tag_id_create_stmt=$connection->prepare("INSERT INTO cw_tags_ids (cw_id,tag_id) VALUES (?,?)");

$CW_tag_id_read_BY_CW_stmt=$connection->prepare("SELECT * FROM cw_tags_ids WHERE cw_id=?");
$CW_tag_id_read_BY_Tag_stmt=$connection->prepare("SELECT * FROM cw_tags_ids WHERE tag_id=?");

$CW_tag_id_read_BY_Tag_Join_stmt=$connection->prepare("SELECT * FROM cw_tags INNER JOIN cw_tags_ids ON cw_tags.tag_id=cw_tags_ids.tag_id WHERE cw_tags_ids.cw_id=?");



$CW_tag_id_update_stmt=$connection->prepare("UPDATE cw_tags_ids SET cw_id=?, tag_id=?");

$CW_tag_id_delete_BY_Tag_stmt=$connection->prepare("DELETE FROM cw_tags_ids WHERE tag_id=?");
$CW_tag_id_delete_BY_CW_stmt=$connection->prepare("DELETE FROM cw_tags_ids WHERE cw_id=?");


//media CRUD
$media_create_stmt=$connection->prepare("INSERT INTO media (media_type) VALUES (?)");
$media_read_stmt=$connection->prepare("SELECT * FROM media WHERE media_id=?");
$media_update_stmt=$connection->prepare("UPDATE media SET media_type=?");
$media_delete_stmt=$connection->prepare("DELETE FROM media WHERE media_id=?");



?>