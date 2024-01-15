<?php 
include "../../php_util/db.php";
include "../includes/commentsHeader.php";



function is_child($connection,$com_id){

$query="SELECT is_reply FROM comments WHERE com_id=".$com_id;
$isChild_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($isChild_query)){
  
  $is_reply=$row['is_reply'];
  if($is_reply==1){
    $parent_id=$row['parent_id'];
    return $parent_id;
  }
  return $is_reply;

}


}

function hasChildren($connection,$com_id){

  $query="SELECT reply_count FROM comments WHERE com_id=".$com_id;
  $hasChild_query=mysqli_query($connection,$query);
  $row=mysqli_fetch_assoc($hasChild_query);
  $reply_count=$row['reply_count'];
  return $reply_count;
  
  }



function find_children($connection,$com_id,$post_id){
  $com_id_array=array($com_id);
  $search_query="SELECT * FROM comments WHERE is_reply=1 AND com_post_id=".$post_id;
  $reply_query=mysqli_query($connection,$search_query);
 while($row=mysqli_fetch_assoc($reply_query)){

  $reply_com_id=$row['com_id'];
  $reply_count=$row['reply_count'];
  $parent_id=$row['parent_id'];

  if($reply_count>0){
      array_push($com_id_array,$reply_com_id);
      if($parent_id==$com_id){

          array_push($com_id_array,find_children($connection,$reply_com_id,$post_id));

      }

  }



 } 

 return $com_id_array;


}

function findThreadReplies($connection,$com_id,$post_id){

  $com_id_array=array($com_id);
  $search_query="SELECT * FROM comments WHERE is_reply=1 AND com_post_id=".$post_id;
  $reply_query=mysqli_query($connection,$search_query);
 while($row=mysqli_fetch_assoc($reply_query)){

  $reply_com_id=$row['com_id'];
  $reply_count=$row['reply_count'];
  $parent_id=$row['parent_id'];

if($parent_id==$com_id){
  array_push($com_id_array,$reply_com_id);
}


 } 

 return $com_id_array;

}



function commentCounterDecrement($connection){
  if(isset($_GET['del_id'])){
    $del_id=$_GET['del_id'];
  }
    // Check if creative writing comment or blog post comment
    var_dump($del_id);
    $query="SELECT is_cw FROM comments WHERE com_id=".$del_id;
    $check_is_cw_query=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($check_is_cw_query);
    var_dump($row);
    $is_cw=intval($row['is_cw']);
    if($is_cw==1){
      
      
      $cw_query="SELECT writing_id,writing_comment_count FROM cw INNER JOIN comments ON cw.writing_id=comments.com_cw_id WHERE com_id =".$del_id;
      $comment_count_query=mysqli_query($connection,$cw_query);
      while($row=mysqli_fetch_assoc($comment_count_query)){
        $writing_id=$row['writing_id'];
        $comment_count=$row['writing_comment_count'];

        --$comment_count;
      $del_counter_query="UPDATE cw SET writing_comment_count=".$comment_count." WHERE writing_id =".$writing_id;
      $update_comment_count_query=mysqli_query($connection,$del_counter_query);
      confirmQuery($update_comment_count_query);
      }
      
      
      
    }

    else{
      $posts_query="SELECT post_id,post_comment_count FROM posts INNER JOIN comments ON posts.post_id = comments.com_post_id WHERE comments.com_id=".$del_id;
      $comment_count_query=mysqli_query($connection,$posts_query);
      while($row=mysqli_fetch_assoc($comment_count_query)){
        $post_id=$row['post_id'];
        echo $post_id." is post_id ";
        $comment_count=$row['post_comment_count'];
        echo $comment_count." comments before decrement";

        //check for replies to thread
        $children_array=find_children($connection,$del_id,$post_id);

        //if children, they are removed as well, decremented
        if($children_array>1){
          $comment_count_subtraction=count($children_array);
          $comment_count=$comment_count-$comment_count_subtraction;

          $del_counter_query="UPDATE posts SET post_comment_count=".$comment_count." WHERE post_id =".$post_id;
          $update_comment_count_query=mysqli_query($connection,$del_counter_query);
          confirmQuery($update_comment_count_query);
        }

        else{
          --$comment_count;
          $del_counter_query="UPDATE posts SET post_comment_count=".$comment_count." WHERE post_id =".$post_id;
          $update_comment_count_query=mysqli_query($connection,$del_counter_query);
          confirmQuery($update_comment_count_query);
        }



         

      }

    }
  
}

function replyCountDecrement($connection,$parent_id,$post_id){

  //get parent's reply count
  $search_query="SELECT reply_count FROM comments WHERE post_id=".$post_id." AND com_id=".$parent_id;
  $get_op_reply_count=mysqli_query($connection,$search_query);
  $row=mysqli_fetch_assoc($get_op_reply_count);
  $op_reply_count=$row['reply_count'];

  //if reply has any children find them, count them, and decrement in loop

  // $search_query="SELECT reply_count FROM comments WHERE post_id=".$post_id." AND com_id=".$com_id;
  // $get_reply_count=mysqli_query($connection,$search_query);
  // $row=mysqli_fetch_assoc($get_reply_count);
  // $reply_count=$row['reply_count'];

  if($op_reply_count>0){
      $reply_children_array=findThreadReplies($connection,$parent_id,$post_id);

      for($i=0;$i<count($reply_children_array);$i++){
          $op_reply_count--;
      }

      $update_query="UPDATE comments SET reply_count = $op_reply_count WHERE com_id=".$parent_id;
      $set_reply_count=mysqli_query($connection,$update_query);
      confirmQuery($set_reply_count);
  }
  else{
      $op_reply_count--;

      $update_query="UPDATE comments SET reply_count = $op_reply_count WHERE com_id=".$parent_id;
      $set_reply_count=mysqli_query($connection,$update_query);
      confirmQuery($set_reply_count);
  }


}

function getPostId($connection,$com_id){
  $query="SELECT com_post_id FROM comments WHERE com_id=".$com_id;
  $post_id_query=mysqli_query($connection,$query);
  confirmQuery($post_id_query);
  $row=mysqli_fetch_assoc($post_id_query);
  $post_id=$row['com_post_id'];
  return $post_id;
}



$query="SELECT * FROM comments";
$comments_query=mysqli_query($connection,$query);
confirmQuery($comments_query);


if(isset($_GET['del_id'])){
  $del_id=$_GET['del_id'];

//check if is child

if(is_child($connection,$del_id)>0){
  replyCountDecrement($connection,is_child($connection,$del_id),getPostId($connection,$del_id));
}

//check for children
// if(hasChildren($connection,$del_id)>0){
//   $children_array=find_children($connection,$del_id,$post_id);
//   commentCounterDecrement($connection);

//   for($i=0;$i<count($children_array);$i++){
//     $del_query="DELETE FROM comments WHERE com_id=".$children_array[$i];
//     $test_del_query=mysqli_query($connection,$del_query);
//     confirmQuery($test_del_query);
//   }
// }


  $del_query="DELETE FROM comments WHERE com_id=".$del_id;
  commentCounterDecrement($connection);
  $test_del_query=mysqli_query($connection,$del_query);

  confirmQuery($test_del_query);



  header("Location: comments.php");
  
}


if(isset($_GET['app_id'])){
  $app_id=$_GET['app_id'];
  $app_query="UPDATE comments SET com_status='Approved' WHERE com_id=".$app_id;
  $test_app_query=mysqli_query($connection,$app_query);
  confirmQuery($test_app_query);
  header("Location: comments.php");

}

?>

<title>Comments</title>
</head>
<body>
<div class="center table-responsive" data-mdb-perfect-scrollbar="true">
<table class="table table-striped table-light table-sm">
    <thead class="table-light">
      <tr>
        <th scope="col">com_id</th>
        <th scope="col">is_reply</th>
        <th scope="col">parent_id</th>
        <th scope="col">reply_count</th>
        <th scope="col">com_post_id</th>
        <th scope="col">com_cw_id</th>
        <th scope="col">is_cw</th>
        <th scope="col">com_name</th>
        <th scope="col">com_date</th>
        <th scope="col">com_time</th>
        <th scope="col">com_content</th>
        <th scope="col">com_status</th>

      </tr>
    </thead>

<?php
while($row=mysqli_fetch_assoc($comments_query)){
    $com_id=$row['com_id'];
    $is_reply=$row['is_reply'];
    $parent_id=$row['parent_id'];
    $reply_count=$row['reply_count'];
    $com_post_id=$row['com_post_id'];
    $com_cw_id=$row['com_cw_id'];
    $is_cw=$row['is_cw'];
    $com_name=$row['com_name'];
    $com_date=$row['com_date'];
    $com_time=$row['com_time'];
    $com_content=$row['com_content'];
    $com_status=$row['com_status'];

    echo "<tr><td scope='row'>{$com_id}</td>";
    echo "<td scope='row'>{$is_reply}</td>";
    echo "<td scope='row'>{$parent_id}</td>";
    echo "<td scope='row'>{$reply_count}</td>";
    echo "<td scope='row'>{$com_post_id}</td>";
    echo "<td scope='row'>{$com_cw_id}</td>";
    echo "<td scope='row'>{$is_cw}</td>";
    echo "<td scope='row'>{$com_name}</td>";
    echo "<td scope='row'>{$com_date}</td>";
    echo "<td scope='row'>{$com_time}</td>";
    echo "<td scope='row'>{$com_content}</td>";
    echo "<td scope='row'>{$com_status}</td>";
    echo "<td scope='row'><a class='db-link' href='comments.php?del_id=".$com_id."'>Delete</a></td>";

    echo "<td scope='row'><a class='db-link' href='comments.php?app_id=".$com_id."'>Approve</a></td></tr>";


}

?>
</table>
</div>
<script src="../js/jquery-3.6.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>