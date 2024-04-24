<?php 
// http_response_code(404);
//     include('../php_util/404.php');
//     die();

?>

    <div class="row">
        <div class="col-12 ">
            <h1 class="display-4">Create a Blog Post</h1>
            <form action="blog_actions/add-post.php" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-12">
                    <h6>Categories</h6>
                </div>
                <div class="col-6">
                <?php category_Select($connection)?>
                </div>
                
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <h6>Tags</h6>
                </div>
                <div class="col-8">
                <?php tags_Checkbox($connection)?>
                </div>
                <div class="col-12 mb-3">
                    <label for="img_input" class="form-label">Choose Cover Image</label>
                    <input type="file" name="image" id="" class="form-control">
                </div>
                    
                
            </div>
            <!-- </form> -->
        </div>
        <div class="col-12">
            <!-- <form action="blog_actions/add-post.php" method="post"> -->
                <div class="mb-3">
                    <label class="form-label" for="post_title">Title</label>
                    <input class="form-control" type="text" name="post_title" id="">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="post_content" id="" cols="70" rows="30"></textarea>
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Submit" name="submitBtn">
                </div>
            </form>
        </div>
    </div>


