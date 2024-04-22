<div class="row">
        <div class="col-12 ">
            <h1 class="display-4">Creative Writing Form</h1>
            <form action="cw-input.php" method="post">
            <div class="row mb-3">
                <div class="col-12">
                    <h6>Genres</h6>
                </div>
                <div class="col-6">
                <?php genre_Select($connection)?>
                </div>
                
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <h6>Tags</h6>
                </div>
                <div class="col-8">
                <?php tags_CW_Checkbox($connection)?>
                </div>
                    
                
            </div>
            </form>
        </div>
        <div class="col-12">
            <form action="cw-input.php" method="post">
                <div class="mb-3">
                    <label for="post-title" class="form-label">Title</label>
                    <input type="text" name="post-title" class="form-control" id="" >
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="cw_content" id="" cols="100" rows="30"></textarea>
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Submit" name="submitBtn">
                </div>
            </form>
        </div>
    </div>


