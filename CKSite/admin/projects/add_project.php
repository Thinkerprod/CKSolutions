<?php 
include "../../php_util/db.php";
include "../includes/addProjects_Header.php";

?>

<div class="add-project">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="proj_name"></label>
            <input type="text" class="form-control" name="proj_name" id="">
        </div>
        <div class="form-group">
            <label for="proj_status"></label>
            <select name="proj_status" id="">
                <option value="current">current</option>
                <option value="past">past</option>
            </select>
        </div>
        <div class="form-group">
            <label for="proj_location"></label>
            <input type="text" class="form-control" name="proj_location" id="">
        </div>
        <div class="form-group">
            <label for="proj_image"></label>
            <input type="file" class="form-control" name="proj_image" id="">
        </div>
        <div class="form-group">
            <label for="proj_stack"></label>
            <input type="text" class="form-control" name="proj_stack" id="stack_input">
            <!-- <div class="btn-input">HTML</div>
            <div class="btn-input">JS</div>
            <div class="btn-input">CSS</div>
            <div class="btn-input">PHP</div>
            <div class="btn-input">NODE.JS</div>
            <div class="btn-input">PUG</div>
            <div class="btn-input">DRUPAL</div> -->
        </div>
        <div class="form-group">
            <label for="proj_desc"></label>
            <input type="text" class="form-control" name="proj_desc" id="">
        </div>
        <div class="form-group">
            <label for="proj_date"></label>
            <input type="date" class="form-control" name="proj_date" id="">
        </div>
        <div class="form-group">
        <input type="submit" name="save_proj" id="">
        </div>
    </form>
</div>

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

   $query="INSERT INTO projects(proj_name,proj_status,proj_location,proj_image,proj_stack,proj_desc,proj_date) VALUES('{$proj_name}','{$proj_status}','{$proj_location}',
   '{$proj_image}','{$proj_stack}','{$proj_desc}','{$proj_date}')";

   $test_query=mysqli_query($connection,$query);
   confirmQuery($test_query);

}

?>