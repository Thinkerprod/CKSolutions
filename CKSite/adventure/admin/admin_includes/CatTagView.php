<?php include_once "admin_includes/db_classes.php";?>

<div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="row">
        <div class="col-12">
        <?php read_All_Categories($connection)?>
        
        <form action="blog_actions/add-cat.php" method="post">
            <div class="input-group">
                <input type="text" name="cat_input" id="" class="form-control" placeholder="Add Category">
                <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
            </div>
        </form>
        

        </div>

        <div class="col-12">
        <?php read_All_Tags($connection)?>
      
            <form action="blog_actions/add-tag.php" method="post">
            <div class="input-group">  
                    <input type="text" name="tag_input" id="" class="form-control" placeholder="Add Tag">
                    <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                    </div>
                </form>

   
        </div>

    </div>
    
</div>