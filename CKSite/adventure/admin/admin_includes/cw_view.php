<?php 

include_once "../cw/cw_read_write.php";
if(isset($_GET['cw_id'])){
    $cw_id=$_GET['cw_id'];

    $cw_read_stmt->bind_param("i",$cw_id);
    $cw_read_stmt->execute();
    $cw_read_results=$cw_read_stmt->get_result();
    while($cw_row=$cw_read_results->fetch_assoc()){
        $cw_title=$cw_row['cw_title'];
        $cw_date=$cw_row['cw_date'];
        $cw_filename=$cw_row['cw_filename'];
        $cw_comment_count=$cw_row['cw_comment_count'];
        $cw_published=$cw_row['cw_published'];

        $comment_string=$cw_comment_count." Comments";
        if($cw_published==0){
            $publish="<form action='cw_actions/publish.php' method='post'>
            <input type='hidden' name='cw_id' value='{$cw_id}'>
            <input type='submit' class='btn btn-primary' name='submitBtn' value='Publish'>
        </form>";
        }
        else{
            $publish="<form action='cw_actions/revert_draft.php' method='post'>
            <input type='hidden' name='cw_id' value='{$cw_id}'>
            <input type='submit' class='btn btn-primary' name='submitBtn' value='Revert to Draft'>
        </form>";
        }

    }
    $genre_string="<ul>";
    $genre_item="";

    $genre_read_BY_genre_id_Join_stmt->bind_param("i",$cw_id);
    $genre_read_BY_genre_id_Join_stmt->execute();
    $genre_results=$genre_read_BY_genre_id_Join_stmt->get_result();
    while($genre_row=$genre_results->fetch_assoc()){
        $genre_name=$genre_row['genre_name'];
        $genre_item.="<li>".$genre_name."</li>";
        
    }

    $genre_string.=$genre_item."</ul>";


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

    $filepath="../cw/".$cw_filename;

   $content = read_writing($filepath);

   $img_src="../images/Cory-Profile.jpg";

   $view_string="<div class='row gy-2 cw-read-container'>
   <div class='col-12'>
       <div class='h1 display-3'>{$cw_title}</div>
   </div>
   <div class='col-12 author d-flex align-items-center'>
        <img src='{$img_src}' alt='picture of the author'><small class='fst-italic'>written by Cory Kutschker</small>
    </div>
   <div class='col-12 content-container mb-2'>
       <div class='fs-5' id='content'>{$content}</div>  
   </div>
   <div class='col-12'>
       <div class='info d-flex justify-content-around align-items-center'>
            <div class='d-flex justify-content-center align-items-center' id='share'><i class='fa-solid fa-share-nodes'></i></div>
            <div class='d-flex justify-content-center align-items-center' id='comments'>{$comment_string}</div>
            <div class='d-flex justify-content-center align-items-center' id='genres'>{$genre_string}</div>
            <div class='d-flex justify-content-center align-items-center' id='tags'>{$tag_string}</div>
            <div class='d-flex justify-content-center align-items-center' id='published'>
                {$publish}
            </div>
       </div>
   </div>
</div>";

echo $view_string;



}



?>

