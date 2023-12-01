<?php 
include "../../php_util/db.php";
include "../includes/commentsHeader.php";

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
        --$comment_count;
        $del_counter_query="UPDATE posts SET post_comment_count=".$comment_count." WHERE post_id =".$post_id;
        $update_comment_count_query=mysqli_query($connection,$del_counter_query);
        confirmQuery($update_comment_count_query);

      }
      
      

    }
    
    

  
}

$query="SELECT * FROM comments";
$comments_query=mysqli_query($connection,$query);
confirmQuery($comments_query);


if(isset($_GET['del_id'])){
  $del_id=$_GET['del_id'];
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
</body>
</html>