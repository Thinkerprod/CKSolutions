    <div class="row">
        <div class="col-12 ">
            <h1 class="display-4">Creative Writing Form</h1>
            <form action="cw_actions/add-cw.php" method="post" enctype="multipart/form-data" id="add_cw_form">
            <div class="row mb-3">
            <div class="col-8">
                <h6>Writing type</h6>
                    <?php type_select($connection);?>
                </div>
                <div class="col-12">
                    <h6>Genres</h6>
                </div>
                
                <div class="col-8">
                <?php genre_Switch($connection);?>
                </div>
                
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <h6>Tags</h6>
                </div>
                <div class="col-8">
                <?php tags_CW_Checkbox($connection);?>
                </div>
                    
                
            </div>
            
        </div>
        <div class="col-12">
            
                <div class="mb-3">
                    <label for="cw_title_input" class="form-label">Title</label>
                    <input type="text" name="cw_title" class="form-control" id="cw_title_input" >
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="cw_content" id="summernote" cols="100" rows="30"></textarea>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="cw_content_trunc" id="content_truncate" cols="100" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Submit" name="submitBtn">
                </div>
            </form>
        </div>
    </div>


