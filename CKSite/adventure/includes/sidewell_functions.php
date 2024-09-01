<?php 

include_once "php_util/db.php";

function getAllPostTags($connection){
$tagQuery="SELECT * FROM post_tags";
$tags_result=mysqli_query($connection,$tagQuery);
$tag_links="<ul class='list-decoration-none'>";
while($tag_row=mysqli_fetch_assoc($tags_result)){
    $tag_id=$tag_row['tag_id'];
    $tag=$tag_row['tag_name'];
    $tag_links.="<li><a href='blog-adventure.php?src=tags&tag={$tag_id}'>#{$tag}</a></li>";

}
$tag_links.="</ul>";
echo $tag_links;
}

function getAllPostCategories($connection){
    $catQuery="SELECT * FROM categories";
    $cat_results=mysqli_query($connection,$catQuery);
    $cat_list="<ul class='list-decoration-none'>";
    while($cat_row=mysqli_fetch_assoc($cat_results)){
        $cat_id=$cat_row['cat_id'];
        $cat=$cat_row['cat_title'];
        $cat_list.="<li><a href='blog-adventure.php?src=cats&cat={$cat_id}'>{$cat}</a></li>";

    }
    $cat_list.="</ul>";
    echo $cat_list;
}






?>