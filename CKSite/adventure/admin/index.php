<?php 
include_once "admin_includes/admin_header.php";
?>
<div class="container-fluid">

    <h1 class="display-2">Welcome Cory</h1>
    <div class="nav">
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#collapse-drawer" aria-controls="offcanvasExample">
    Add Content
    </button>
    <a href="" class="btn btn-primary" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Posts</a>
    <a href="" class="btn btn-primary" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Creative Writing</a>
    <a href="" class="btn btn-primary" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Gallery</a>
    </div>

    <div class="drawer">
        <div class="collapse collapse-horizontal" id="collapse-drawer">
            <div class="drawer-nav d-flex flex-column align-items-center">
                <ul class="d-flex flex-column align-items-center">
                    <a href="">
                        <li>Add Post</li>
                    </a><a href="">
                        <li>Add Some Writing</li>
                    </a><a href="">
                        <li>Add to Gallery</li>
                    </a><a href="">
                        <li>Categories</li>
                    </a><a href="">
                        <li>Genres</li>
                    </a><a href="">
                        <li>Media</li>
                    </a><a href="">
                        <li>Comments</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>

    

</div>
<?php include_once "admin_includes/admin_footer.php"; ?>