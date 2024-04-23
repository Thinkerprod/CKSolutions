<div class="row">
    <div class="col-12">
    <?php read_All_Genres($connection)?>
    </div>
    <div class="col-12">
        <form action="blog-actions/add-genre.php" method="post">
            <div class="input-group mb-3">
                <input type="text" name="genre_input" id="" class="form-control" placeholder="Add genre" aria-label="add genre form">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-12">
    <?php read_All_Media($connection)?>
    </div>
    <div class="col-12">
    <form action="blog-actions/add-media.php" method="post">
            <div class="input-group mb-3">
                <input type="text" name="media_input" id="" class="form-control" placeholder="Add media" aria-label="add media form">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>