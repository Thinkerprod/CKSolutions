<?php 
include_once "php_util/db.php";
include_once "cw/cw_read_write.php";

// function sort_content($content){


    
// }

function display_gallery_info_lg($id,$stmt){

    $card="
    <div class='display-large'>
    <a class='close-btn' href='gallery.php'><i class='fa-solid fa-x'></i></a>
    ";
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt_results=$stmt->get_result();
    while($row=$stmt_results->fetch_assoc()){
        $g_title=$row['gallery_title'];
        $g_BL_check=$row['is_blacklight'];
        $g_year=$row['gallery_year'];
        $g_image=$row['gallery_image'];
        $g_BL_image=$row['gallery_BL_image'];
        $size_amount=$row['size_amount'];
        $g_orient=$row['gallery_orientation'];
        $media_type=$row['media_type'];
        $mat_type=$row['mat_type'];

        $alt="image of ".$g_title;

        $img_path="images/gallery/{$g_image}";
        $img_BL_path="images/gallery/{$g_BL_image}";

        if($g_orient==1){
            //if picture is oriented as landscape then the card will be vertical
           $card.="
        <div class='card'>"; 
           //if picture is blacklight then I create a swiper in the card that allows it to cycle between normal photo and blacklight photo
           if($g_BL_check==1){
            $alt_BL="Blacklight image of ".$g_title;
            $card=
            "
        <div class='blacklight-card'>
            <div class='swiper-container'>
                <div class='swiper-wrapper'>
                    <div class='swiper-slide'>
                        <img src='{$img_path}' alt='{$alt}' class='swiper-lazy img-fluid' />
                        <div class='swiper-lazy-preloader'></div>
                    </div>
                    <div class='swiper-slide'>
                        <img src='{$img_BL_path}' alt='{$alt_BL}' class='swiper-lazy img-fluid' />
                        <div class='swiper-lazy-preloader'></div>
                    </div>
                    <div class='swiper-button-prev'></div>
                    <div class='swiper-button-next'></div>
                </div>
            </div>";
            $card.="
        <div class='card'>
            <div class='card-body'>
                <div class='card-title'>{$g_title}</div>
                    <ul>
                        <li>{$media_type}</li>
                        <li>{$mat_type}</li>
                        <li>{$size_amount}</li>
                        <li>{$g_year}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>";
            }
            //if picture is normal then it just gets a rounded cap
            else{
                $card.="
                <img src='{$img_path}' class='card-img-top img-fluid' />
                <div class='card-body'>
                <div class='card-title'>{$g_title}</div>
                    <ul>
                        <li>{$media_type}</li>
                        <li>{$mat_type}</li>
                        <li>{$size_amount}</li>
                        <li>{$g_year}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>";
            }
        }
        //if picture is oriented as portrait then card is oriented horizontally
        else{
            $card.="<div class='card'>";
            if($g_BL_check==1){
                //if picture is blacklight then I create a swiper in the card that allows it to cycle between normal photo and blacklight photo
                $alt_BL="Blacklight image of ".$g_title;
                $card.="
                <div class='row'>
                    <div class='col-md-4'>
                        <div class='swiper-container'>
                            <div class='swiper-wrapper'>
                                <div class='swiper-slide'>
                                    <img src='{$img_path}' alt='{$alt}' class='swiper-lazy img-fluid' />
                                    <div class='swiper-lazy-preloader'></div>
                                </div>
                                <div class='swiper-slide'>
                                    <img src='{$img_BL_path}' alt='{$alt_BL}' class='swiper-lazy img-fluid' />
                                    <div class='swiper-lazy-preloader'></div>
                                </div>
                                <div class='swiper-button-prev'></div>
                                <div class='swiper-button-next'></div>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-8'>
                    <div class='card-body'>
                        <div class='card-title'>{$g_title}</div>
                        <ul>
                            <li>{$media_type}</li>
                            <li>{$mat_type}</li>
                            <li>{$size_amount}</li>
                            <li>{$g_year}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>";

            }
            else{
                $card.="
            <div class='row'>
                <div class='col-md-4'>
                
                </div>
                <div class='col-md-8'>
                    <div class='card-body'>
                    <div class='card-title'>{$g_title}</div>
                    <ul>
                        <li>{$media_type}</li>
                        <li>{$mat_type}</li>
                        <li>{$size_amount}</li>
                        <li>{$g_year}</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>";

            }
        }

    }

    return $card;
}

function display_gallery_info_sm($id,$stmt){

    $card="<div class='display-large'>
    <a class='close-btn' href='gallery.php'><i class='fa-solid fa-x'></i></a>
    ";
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt_results=$stmt->get_result();
while($row=$stmt_results->fetch_assoc()){
    $g_title=$row['gallery_title'];
    $g_BL_check=$row['is_blacklight'];
    $g_year=$row['gallery_year'];
    $g_image=$row['gallery_image'];
    $g_BL_image=$row['gallery_BL_image'];
    $size_amount=$row['size_amount'];
    $g_orient=$row['gallery_orientation'];
    $media_type=$row['media_type'];
    $mat_type=$row['mat_type'];

    if($g_orient==1){
       $card.="<div class='card'>";
        if($g_BL_check==1){
            $card.="
            <div class='swiper-container'>
                <div class='swiper-wrapper'>";
        }
    }
    else{
        $card.="<div class='card'>";
    }

}
}
?>





<div class='blacklight-card'></div>