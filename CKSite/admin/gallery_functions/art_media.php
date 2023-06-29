<?php 
include "../../php_util/db.php";
include "../includes/cat_media_header.php";

if(isset($_GET['del_id'])){
$del_id=$_GET['del_id'];

$del_query="DELETE FROM media WHERE media_id=".$del_id;

    $sent_del_query=mysqli_query($connection,$del_query);
    confirmQuery($sent_del_query);
    header("Location: art_media.php");

}



$query="SELECT * FROM media";
$media_query=mysqli_query($connection,$query);



?>

<title>Art Media</title>
</head>
<body>

<div class="table-responsive" data-mdb-perfect-scrollbar="true">
<table class="table table-striped table-light table-sm">
    <thead class="table-light">
      <tr>
        <th scope="col">cat_id</th>
        <th scope="col">cat_title</th>

      </tr>
    </thead>

<?php 

while($row=mysqli_fetch_assoc($media_query)){
    $media_id=$row['cat_id'];
    $media_type=$row['cat_title'];

    echo "<tr><td scope='row'>{$media_id}</td>";
    echo "<td scope='row'>{$media_type}</td>";
    echo "<td scope='row'><a class='db-link' href='categories.php?del_id=".$media_id."'>delete</a></td></tr>";
}
?>
</table>

<h2>Add Media</h2>

<form action="" method="post" enctype="multipart/form-data">
<label for="form_title">Media Type</label>
<input type="text" name="media_title" id="form_title">

<input class="input_btn" type="submit" value="Submit" name="submit_btn">

</form>

<?php
if(isset($_POST['submit_btn'])){
    $new_media_type=$_POST['cat_title'];

    $add_media_query="INSERT INTO media (media_id,media_type) VALUES ('{$new_media_type}')";
    $test_query=mysqli_query($connection,$add_media_query);
    confirmQuery($test_query);
}

?>

</body>
</html>