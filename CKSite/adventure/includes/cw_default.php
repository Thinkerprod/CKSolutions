<?php 

include_once "php_util/db.php";
// include_once "cw/cw_read_write.php";



$genre_read_BY_cw_id_Join_stmt->bind_param("i",$cw_id);

$view_all_cw_query="SELECT * FROM cw WHERE cw_published=1";
    $cw_results=mysqli_query($connection,$view_all_cw_query);
    while($row=mysqli_fetch_assoc($cw_results)){
        $cw_id=$row['cw_id'];
        $cw_type=$row['cw_type'];
        $cw_title=$row['cw_title'];
        $cw_date=$row['cw_date'];
        // $cw_filename=$row['cw_filename'];
        $cw_view_count=$row['cw_view_count'];
        $cw_likes=$row['cw_likes'];

        $genres_string="<ul>";
        
        $genre_read_BY_cw_id_Join_stmt->execute();
        $genre_results=$genre_read_BY_cw_id_Join_stmt->get_result();
        while($genre_row=$genre_results->fetch_assoc()){
            $genre_name=$genre_row['genre_name'];
            $genres_string.="<li class='mx-1'>".$genre_name."</li>";
        }

        $genres_string.="</ul>";

        $genre_read_BY_cw_id_Join_stmt->close();

        $CW_tag_id_read_BY_Tag_Join_stmt->bind_param("i",$cw_id);
        $CW_tag_id_read_BY_Tag_Join_stmt->execute();
        $tag_results=$CW_tag_id_read_BY_Tag_Join_stmt->get_result();

        $tag_string="<ul>";

        while($tag_row=$tag_results->fetch_assoc()){
            $tag_name=$tag_row['tag_name'];

            $tag_string.="<li class='mx-1'>#".$tag_name."</li>";

        }

        $tag_string.="</ul>";

    
        $datetime_date=date_create($cw_date);
        $formatted_date=date_format($datetime_date,"D d F Y");

        $cw_card="<div class='card-container d-flex justify-content-center align-items-center'>
        <a href='creative-writing.php?src=read-cw&cw_id={$cw_id}'><div class='card d-flex align-items-center'>
        <div class='row g-0'>
        <div class='col-4 d-flex justify-content-center align-items-center'>";
        
        
        

        // $filepath="cw/".$filename;

        if($cw_type==1){
            $img_src="images/typewriter.png";
            $alt="icon of a typewriter";
        }
        else{
            $img_src="images/quill.png";
            $alt="icon of a quill";
        }
        $cw_card.="<img src='{$img_src}' class='img-fluid' alt='{$alt}'></div>";
        $cw_card.="<div class='col-8 d-flex justify-content-center align-items-center'><div class='card-body'><h3 class='card-title'>{$cw_title}</h3>";
        
        // $cw_content=read_writing($filepath);

        $test_content="Cat ipsum dolor sit amet, get away from me stupid dog meow all night so eat prawns daintily with a claw then lick paws clean wash down
         prawns with a lap of carnation milk then retire to the warmest spot on the couch to claw at the fabric before taking a catnap. 
         Cough why can't i catch that stupid red dot so plop down in the middle where everybody walks or poop in a handbag look delicious and 
         drink the soapy mopping up water then puke giant foamy fur-balls russian blue. Claw at curtains stretch and yawn nibble on tuna ignore human bite 
         human hand nya nya nyan. Run up and down stairs ask for petting poop in litter box, scratch the walls yet climb leg, so you call this cat food. 
         Pushed the mug off the table i like to spend my days sleeping and eating fishes that my human fished for me we live on a luxurious yacht,";
        $test_trunc_content=substr($test_content,0,350);
        $test_trunc_content=$test_trunc_content."...";
        $cw_card.="
        <div class='card-text'>{$test_trunc_content}</div>
        <div class='card-text'><small class='text-body-secondary'>Submitted by Cory Kutschker {$formatted_date}</small></div>
        </div></div>
        <div class='card-footer d-flex justify-content-between align-items-center'>

        
        <div class='d-flex justify-content-center align-items-center' id='genres'>{$genres_string}</div>
        <div id='tags'>{$tag_string}</div>

        </div>
        </div></a>
        </div>
        </div>";
        
        echo $cw_card;

    }

?>

