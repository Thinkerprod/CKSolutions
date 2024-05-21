<div class="row">
<div class="d-flex justify-content-center align-items-center col-12">
<h1 class="display-2 my-3">Welcome Cory</h1>
</div>



<div class="d-inline-flex justify-content-center align-items-center gap-1 ">

<btn class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapsePosts" role="button" aria-expanded="false" aria-controls="collapsePosts">Posts</btn>
<btn class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseCW" role="button" aria-expanded="false" aria-controls="collapseCW">Creative Writing</btn>
<btn class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseGallery" role="button" aria-expanded="false" aria-controls="collapseGallery">Gallery</btn>
<btn class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseCatTag" role="button" aria-expanded="false" aria-controls="collapseCatTag">Categories & Tags</btn>
<!-- <btn class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseComments" role="button" aria-expanded="false" aria-controls="collapseComments">Comments</btn> -->
<btn class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapsePI" role="button" aria-expanded="false" aria-controls="collapsePI">Post Images</btn>
<btn class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseGenres" role="button" aria-expanded="false" aria-controls="collapseGenres">Genres & Media</btn>
<btn class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseCWTags" role="button" aria-expanded="false" aria-controls="collapseCWTags">CW Tags & Types</btn>
<btn class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseGallerySizes" role="button" aria-expanded="false" aria-controls="collapseGallerySizes">Gallery Sizes & Material</btn>
</div>
<div class="row">
    <div class="col-12 collapse" id="collapsePosts">
    <?php read_All_Posts($connection)?>
    </div>
    <div class="col-12 collapse" id="collapseCW">
    <?php read_All_CW($connection)?>
    </div>
    <div class="col-12 collapse" id="collapseGallery">
    <?php read_All_Gallery($connection)?>
    </div>
    <div class="col-12 collapse" id="collapseCatTag">
    <?php include_once "admin_includes/CatTagView.php"?>
    </div>

    <div class="col-12 collapse" id="collapsePI">
    <?php read_All_Images($connection)?>
    </div>
    <div class="col-12 collapse" id="collapseGenres">
    <?php include_once "admin_includes/GenreMediaView.php"?>
    </div>
    <div class="col-12 collapse" id="collapseCWTags">
    <?php read_All_CW_Tags($connection);
    read_All_Types($connection);
    ?>
    </div>
    <div class="col-12 collapse" id="collapseGallerySizes">
    <?php read_All_Sizes($connection);
    read_All_Material($connection);?>
    </div>
</div>
</div>