<?php 
include "../../php_util/db.php";
include "../includes/addProjects_Header.php";

if(isset($_GET['p_id'])){
   $p_id = $_GET['p_id'];

   $query="SELECT * FROM projects WHERE proj_id=".$p_id;
   $edit_Query=mysqli_query($connection,$query);

   while($row=mysqli_fetch_assoc($edit_Query)){
    $proj_id=$row['proj_id'];
    $proj_name=$row['proj_name'];
    $proj_status=$row['proj_status'];
    $proj_location=$row['proj_location'];
    $proj_image=$row['proj_image'];
    $proj_stack=$row['proj_stack'];
    $proj_desc=$row['proj_desc'];
    $proj_date=$row['proj_date'];
   }

}



?>
<?php echo $proj_name;?>
<title>Edit Project</title>
<body>
    
<h2>Edit Project</h2>

<div class="add-project">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="proj_name">Project Name</label>
            <input type="text" class="form-control" name="proj_name" id="" value="<?php echo $proj_name;?>">
        </div>
        <div class="form-group">
            <label for="proj_status">Project Status</label>
            <select name="proj_status" id="">
               <option value="current">current</option>
                <option value="past">past</option>
            </select>
        </div>
        <div class="form-group">
            <label for="proj_location">Project Location</label>
            <input type="text" class="form-control" name="proj_location" id="" value="<?php echo $proj_status;?>">
        </div>
        <div class="form-group">
            <label for="proj_image">Project Image</label>
            <input type="file" class="form-control" name="proj_image" id="" value="<?php echo $proj_image;?>">
        </div>
        <div class="form-group">
            <label for="proj_stack">Project Stack</label>
            <input type="text" class="form-control" name="proj_stack" id="stack_input" value="<?php echo $proj_stack;?>">
            <!-- <div class="btn-input">HTML</div>
            <div class="btn-input">JS</div>
            <div class="btn-input">CSS</div>
            <div class="btn-input">PHP</div>
            <div class="btn-input">NODE.JS</div>
            <div class="btn-input">PUG</div>
            <div class="btn-input">DRUPAL</div> -->
        </div>
        <div class="form-group">
            <label for="proj_desc">Project Description</label>
            <input type="text" class="form-control" name="proj_desc" id="" value="<?php echo $proj_desc;?>">
        </div>
        <div class="form-group">
            <label for="proj_date">Project Date</label>
            <input type="date" class="form-control" name="proj_date" id="" value="<?php echo $proj_date;?>">
        </div>
        <div class="form-group">
        <input type="submit" name="save_proj" id="">
        </div>
    </form>
</div>
</body>
</html>
<?php 
if(isset($_POST['save_proj'])){
   $proj_name = $_POST['proj_name'];
   $proj_status = $_POST['proj_status'];
   $proj_location = $_POST['proj_location'];
   $proj_image=$_FILES['proj_image']['name'];
   $proj_image_temp=$_FILES['proj_image']['tmp_name'];
   $proj_stack = $_POST['proj_stack'];
   $proj_desc = $_POST['proj_desc'];
   $proj_date = $_POST['proj_date'];

   move_uploaded_file($post_image_temp, "../business/images/projects/{$proj_image}");

   $edit_final_query="UPDATE projects SET proj_name='{$proj_name}',
   proj_status='{$proj_status}',
   proj_location='{$proj_location}',
   proj_image='{$proj_image}',
   proj_stack='{$proj_stack}',
   proj_desc='{$proj_desc}',
   proj_date='{$proj_date}'";

   $test_query=mysqli_query($connection,$edit_final_query);
   confirmQuery($test_query);
   
   echo "Edit Saved :)";
}

?>