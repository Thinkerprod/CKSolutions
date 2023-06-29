<?php 
include "../../php_util/db.php";
include "../includes/commentsHeader.php";


$query="SELECT * FROM comments";
$comments_query=mysqli_query($connection,$query);
confirmQuery($comments_query);


if(isset($_GET['del_id'])){
  $del_id=$_GET['del_id'];
  $del_query="DELETE FROM comments WHERE com_id=".$del_id;
  $test_del_query=mysqli_query($connection,$del_query);
  confirmQuery($test_del_query);
  header("Location: comments.php");
}


if(isset($_GET['app_id'])){
  $app_id=$_GET['app_id'];
  $app_query="UPDATE comments SET com_status='Approved'";
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
        <th scope="col">com_post_id</th>
        <th scope="col">com_cw_id</th>
        <th scope="col">com_name</th>
        <th scope="col">com_date</th>
        <th scope="col">com_content</th>
        <th scope="col">com_status</th>

      </tr>
    </thead>

<?php
while($row=mysqli_fetch_assoc($comments_query)){
    $com_id=$row['com_id'];
    $com_post_id=$row['com_post_id'];
    $com_cw_id=$row['com_cw_id'];
    $com_name=$row['com_name'];
    $com_date=$row['com_date'];
    $com_content=$row['com_content'];
    $com_status=$row['com_status'];

    echo "<tr><td scope='row'>{$com_id}</td>";
    echo "<td scope='row'>{$com_post_id}</td>";
    echo "<td scope='row'>{$com_cw_id}</td>";
    echo "<td scope='row'>{$com_name}</td>";
    echo "<td scope='row'>{$com_date}</td>";
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