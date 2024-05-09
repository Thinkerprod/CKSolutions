<?php 

include_once "../cw/cw_read_write.php";

if(isset($_GET['cw_id'])){
    $cw_id=$_GET['cw_id'];

    $edit_form="<div class='row'>
    <div class='col-12 '>
        <h1 class='display-4'>Creative Writing Form</h1>
        <form action='cw_actions/add-cw.php' method='post'>
        <div class='row mb-3'>
            <div class='col-12'>
                <h6>Genres</h6>
            </div>
            <div class='col-12'>";


            $switch_menu=genre_Switch_On($connection,$genre_id_read_BY_CW_stmt,$cw_id);
            $edit_form.=$switch_menu;
            $edit_form.="                </div>
                
            </div>
            <div class='row mb-3'>
                <div class='col-12'>
                    <h6>Tags</h6>
                </div>
                <div class='col-8'>";

    $cw_read_stmt->bind_param("i",$cw_id);
    $cw_read_stmt->execute();

   $cw_results = $cw_read_stmt->get_results();
   while($row=$cw_results->fetch_assoc()){
    $cw_title=$row['cw_title'];
    $cw_date=$row['cw_date'];
    $cw_filename=$row['cw_filename'];
    $cw_content=read_writing($cw_filename);
   }


}


?>

                

                <?php tags_CW_Checkbox($connection)?>
                </div>
                    
                
            </div>
            </form>
        </div>
        <div class='col-12'>
            
                <div class='mb-3'>
                    <label for='post-title' class='form-label'>Title</label>
                    <input type='text' name='cw_title' class='form-control' id='' >
                </div>
                <div class='mb-3'>
                    <textarea class='form-control' name='cw_content' id='summernote' cols='100' rows='30'></textarea>
                </div>
                <div class='mb-3'>
                    <input class='btn btn-primary' type='submit' value='Submit' name='submitBtn'>
                </div>
            </form>
        </div>
    </div>