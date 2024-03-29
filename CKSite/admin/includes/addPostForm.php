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
    <form action="blog_functions/addPost.php" class="add-form" method="post" id="addPostForm" enctype="multipart/form-data">
        <label for="post_title">Post Title</label>
      <input type="text" name="post_title" >
      <label for="is_creative_writing">Check if Creative Writing</label>
      <select name="is_creative_writing" id="is_creative">
        <option value="0">0</option>
        <option value="1">1</option>
      </select>
      
      <label for="post_category">Pick Category</label>
      <select name="post_category" id="category">
        <?php echo $options; ?>
      </select>
      <label for="genre_select">Pick Genre</label>
      <select name="genre_select" id="genre">
      <?php echo $genreOptions; ?>
      </select>
      <label for="post_date">Date</label>
      <input type="date" name="post_date" >
      <label for="post_image">Choose Image</label>
      <input type="file" name="post_image" id="pimage">
      <label for="post_content">Content</label>
      <textarea type="text" name="post_content" rows="10" cols="45" form="addPostForm"></textarea>
      <label for="post_tags">Tags</label>
      <input type="text" name="post_tags" >
      <input type="submit" value="Create Blog Post" name="create_post" id='submitBtn'>
    </form>
</div>

<!-- Tiny MCE -->

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/r7nnl068rso6ofif2sbejxaiynchr0nwagt5rz2qurdfqkh3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>
<!-- <textarea>
  Welcome to TinyMCE!
</textarea> -->