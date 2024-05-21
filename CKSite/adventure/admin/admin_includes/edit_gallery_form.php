<?php 
include_once "../php_util/db.php";
include_once "admin_includes/db_classes.php";

if(isset($_GET['g_id'])){
$g_id=$_GET['g_id'];

$gallery_read_stmt->bind_param("i",$g_id);
$gallery_read_stmt->execute();
$gallery_result=$gallery_read_stmt->get_result();
while($gallery_row=$gallery_result->fetch_assoc()){
    $gallery_title=$gallery_row['gallery_title'];
    $gallery_media_id=$gallery_row['gallery_media_id'];
    $is_blacklight=$gallery_row['is_blacklight'];
    $gallery_size=$gallery_row['gallery_size'];
    $gallery_year=$gallery_row['gallery_year'];
    $gallery_material_id=$gallery_row['gallery_material_id'];
    $gallery_image=$gallery_row['gallery_image'];
    $gallery_BL_image=$gallery_row['gallery_BL_image'];
}




$edit_form="<div class='row'>
<div class='col-12 mb-3'>
    <h1 class='display-3'>Edit Gallery Form</h1>
</div>
<div class='col-6'>
    <form action='gallery_actions/update_gallery.php' method='post'>
        <div class='mb-3'>
            <label for='gallery_title' class='form-label'>Title</label>
            <input type='text' name='gallery_title' id='' value='{$gallery_title}' class='form-control'>
        </div>
        <div class='mb-3'>
            <label for='media_select' class='form-label'>Media</label>";

            $edit_form.=media_selected($connection,$media_read_stmt,$g_id);
            $edit_form.="            </div>
            <div class='mb-3'>
                <label for='black_check' class='form-label'>Blacklight</label>";
            $edit_form.=blacklight_checked($gallery_read_BL_check_stmt,$g_id);
            $edit_form.="            </div>
            <div class='mb-3'>
                <label for='size_input' class='form-label'>Size</label>";
                $edit_form.=size_selected($connection,$gallery_read_size_stmt,$g_id);

$gallery_read_stmt->close();
$connection->close();

}


?>






                <input type='text' name='size_input' id='' class='form-control'>
            </div>
            <div class='mb-3'>
                <label for='year_input' class='form-label'>Year</label>
                <input type='text' name='year_input' id='' class='form-control'>
            </div>
            
            <div class='mb-3'><label for='material_select' class='form-label'>Material</label>
            <?php material_Select($connection)?>
            </div>
            <div class='mb-3'>
                <label for='image_input' class='form-label'>Choose Image</label>
                <input type='file' name='image_input' id='' class='form-control'>
            </div>
            <div class='mb-3'>
                <label for='image_input_BL' class='form-label'>Choose Matching Blacklight Image</label>
                <input type='file' name='image_input_BL' id='' class='form-control'>
            </div>
            <div class='mb-3'>
                <input type='submit' value='Submit' class='form-control btn btn-primary' name='submitBtn'>
            </div>
        </form>
    </div>
</div>