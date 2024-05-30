<div class="row">
    <div class="col-12 mb-3">
        <h1 class="display-3">Add to Gallery</h1>
    </div>
    <div class="col-6">
        <form action="gallery_actions/add_gallery.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="gallery_title" class="form-label">Title</label>
                <input type="text" name="gallery_title" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="media_select" class="form-label">Media</label>
                <?php media_Select($connection)?>
            </div>
            <div class="mb-3">
                <label for="black_check" class="form-label">Blacklight</label>
                <input type="checkbox" name="black_check" id="" class="form-check-input">
            </div>
            <div class="mb-3">
                <label for="size_input" class="form-label">Size</label>
                <?php size_Select($connection);?>
            </div>
            <div class="mb-3">
                <label for="o_select" class="form-label">Select Orientation</label>
                <select name="o_select" id="">
                    <option value="1">Landscape</option>
                    <option value="2">Portrait</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="year_input" class="form-label">Year</label>
                <input type="text" name="year_input" id="" class="form-control">
            </div>
            
            <div class="mb-3"><label for="material_select" class="form-label">Material</label>
            <?php material_Select($connection)?>
            </div>
            <div class="mb-3">
                <label for="image_input" class="form-label">Choose Image</label>
                <input type="file" name="image_input" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="image_input_BL" class="form-label">Choose Matching Blacklight Image</label>
                <input type="file" name="image_input_BL" id="" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" value="Submit" class="form-control btn btn-primary" name="submitBtn">
            </div>
        </form>
    </div>
</div>