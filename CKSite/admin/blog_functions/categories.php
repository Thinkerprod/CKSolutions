<?php 
include "../../php_util/db.php";
include "../includes/cat_media_header.php";

if(isset($_GET['del_id'])){
$del_id=$_GET['del_id'];

$del_query="DELETE FROM categories WHERE cat_id=".$del_id;

    $sent_del_query=mysqli_query($connection,$del_query);
    confirmQuery($sent_del_query);
    header("Location: categories.php");

}



$query="SELECT * FROM categories";
$cat_query=mysqli_query($connection,$query);



?>

<title>Categories</title>
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

while($row=mysqli_fetch_assoc($cat_query)){
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];

    echo "<tr><td scope='row'>{$cat_id}</td>";
    echo "<td scope='row'>{$cat_title}</td>";
    echo "<td scope='row'><a class='db-link' href='categories.php?del_id=".$cat_id."'>delete</a></td></tr>";
}
?>
</table>

<h2>Add Category</h2>

<form action="" method="post" enctype="multipart/form-data">
<label for="form_title">Category Title</label>
<input type="text" name="cat_title" id="form_title">

<input class="input_btn" type="submit" value="Submit" name="submit_btn">

</form>

<?php
if(isset($_POST['submit_btn'])){
    $new_cat_title=$_POST['cat_title'];

    $add_cat_query="INSERT INTO categories (cat_id,cat_title) VALUES ('{$new_cat_title}')";
    $test_query=mysqli_query($connection,$add_cat_query);
    confirmQuery($test_query);
}

?>

</body>
</html>