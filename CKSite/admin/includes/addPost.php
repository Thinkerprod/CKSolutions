<?php 
include_once("../php_util/db.php");
//get categories
$query="SELECT * FROM categories";
$categoriesQuery=mysqli_query($connection,$query);
$options='';
while($row=mysqli_fetch_assoc($categoriesQuery)){
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];

    $options.='<option value="'.$cat_id.'">'.$cat_title.'</option>';

}
//get genres
$genreQuery="SELECT * FROM genre";
$getGenreQuery=mysqli_query($connection,$genreQuery);
$genreOptions='';
while($row=mysqli_fetch_assoc($getGenreQuery)){
    $genre_id=$row['genre_id'];
    $genre_title=$row['genre_name'];

    $genreOptions.='<option value="'.$genre_id.'">'.$genre_title.'</option>';

}


?>



<div class="add-post-container" id="addPostPop">
    <div class="form-close-row">
        <button class="closeForm" id="closeAddBtn">X</button>
    </div>
    <h2>Add Blog Post | Creative Writing</h2>
    <form action="" class="add-form" method="post" id="addPostForm">
        <label for="post_title">Post Title</label>
      <input type="text" name="post_title" id="post_title">
      <label for="is_creative_writing">Check if Creative Writing</label>
      <input type="checkbox" name="is_creative_writing" id="is_creative_writing">
      <label for="post_category">Pick Category</label>
      <select name="post_category" id="post_category">
        <?php echo $options; ?>
      </select>
      <label for="genre_select">Pick Genre</label>
      <select name="genre_select" id="genre_select">
      <?php echo $genreOptions; ?>
      </select>
      <label for="post_date">Date</label>
      <input type="date" name="post_date" id="post_date">
      <label for="post_image">Choose Image</label>
      <input type="file" name="post_image" id="post_image">
      <label for="post_content">Content</label>
      <textarea name="post_content" id="post_content" rows="10" cols="45" form="addPostForm"></textarea>
      <label for="post_tags">Tags</label>
      <input type="text" name="post_tags" id="post_tags">
      <input type="button" value="submit" id="create_post">
    </form>
</div>