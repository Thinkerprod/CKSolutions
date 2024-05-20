<?php
include_once "php_util/db.php";
include_once "cw/cw_read_write.php";
if(isset($_GET['cw_id'])){
    $cw_id=$_GET['cw_id'];

    $cw_read_stmt->bind_param("i",$cw_id);
    $cw_read_stmt->execute();
    $cw_read_results=$cw_read_stmt->get_result();
    while($cw_row=$cw_read_results->fetch_assoc()){
        $cw_type=$cw_row['cw_type'];
        $cw_title=$cw_row['cw_title'];
        $cw_date=$cw_row['cw_date'];
        $cw_filename=$cw_row['cw_filename'];
        $cw_view_count=$cw_row['cw_view_count'];
        // $cw_likes=$cw_row['cw_likes'];
        $cw_shares=$cw_row['cw_shares'];
        $cw_published=$cw_row['cw_published'];

        $view_count_string="<p mb-0 d-flex align-items-center>".$cw_view_count."<i class='px-1 m-0 fa-solid fa-eye'></i></p> ";
        // $like_count_string="<form action='cw_actions/like.php method='post'><label for='likeBtn'>".$cw_likes."</label><btn type='submit' name='like_submit' id='likeBtn'><i class='px-1 m-0 fa-solid fa-thumbs-up'></i></btn></form>";
        $share_count_string=$cw_shares." shares";

        


    }

    if($cw_type==1){

        $genre_string="<ul class='d-flex align-items-center'>";
        $genre_item="";
    
        $genre_read_BY_cw_id_Join_stmt->bind_param("i",$cw_id);
        $genre_read_BY_cw_id_Join_stmt->execute();
        $genre_results=$genre_read_BY_cw_id_Join_stmt->get_result();
        while($genre_row=$genre_results->fetch_assoc()){
            $genre_name=$genre_row['genre_name'];
            $genre_item.="<li class='fs-3 mx-1'>".$genre_name."</li>";
            
        }
    
        $genre_string.=$genre_item."</ul>";
    
        $genre_read_BY_cw_id_Join_stmt->close();

    }
    else{
        $genre_string="<p>Poetry</p>";
    }



    $tag_string="<ul>";
    $tag="";
    $CW_tag_id_read_BY_Tag_Join_stmt->bind_param("i",$cw_id);
    $CW_tag_id_read_BY_Tag_Join_stmt->execute();
    $tag_results=$CW_tag_id_read_BY_Tag_Join_stmt->get_result();
    while($tag_row=$tag_results->fetch_assoc()){
        $tag_name=$tag_row['tag_name'];
        
        $tag.="<li>#".$tag_name."</li>";
       
    }

    $tag_string.=$tag."</ul>";

    $CW_tag_id_read_BY_Tag_Join_stmt->close();

    $filepath="cw/".$cw_filename;

   $content = read_writing($filepath);

   $img_src="images/Cory-Profile.jpg";

   $view_string="<div class='row gy-0 cw-read-container d-flex flex-column justify-content-center align-items-center'>
   <div class='col-12 d-flex justify-content-center align-items-center'>
       <div class='h1 display-3'>{$cw_title}</div>
   </div>
   <div class='col-12 author d-flex justify-content-center align-items-center'>
        <img src='{$img_src}' alt='picture of the author'><small class='mx-2 fst-italic'>written by Cory Kutschker</small>
    </div>
   <div class='col-12 content-container d-flex justify-content-center align-items-center '>
       <div class='fs-2 w-70 mx-2 px-1 py-2' id='content'>{$content}</div>  
   </div>
   <div class='col-12'>
       <div class='info d-flex justify-content-around align-items-center'>
            <div class='fs-3 d-flex justify-content-center align-items-center' id='share'><i class='fa-solid fa-share-nodes'></i></div>

            <div class='fs-3 d-flex justify-content-center align-items-center' id='genres'>{$genre_string}</div>
            <div class='fs-3 d-flex justify-content-center align-items-center' id='tags'>{$tag_string}</div>
       </div>
   </div>
</div>";

echo $view_string;



}



?>

<!-- <div class='fs-3 d-flex justify-content-center align-items-center' id='likes'>{$like_count_string}</div> -->