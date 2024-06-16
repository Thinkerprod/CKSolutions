<?php 
include_once "php_util/db.php";
include_once "cw/cw_read_write.php";

// function sort_content($content){


    
// }

function display_gallery_info_lg($id,$stmt){

    $card="
            <div class='display-large'>
    
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


        //if picture is oriented as portrait then card is oriented horizontally
       
            
        if($g_BL_check==1){
            //if picture is blacklight then I create a swiper in the card that allows it to cycle between normal photo and blacklight photo
            $alt_BL="Blacklight image of ".$g_title;
            $card.="
                
        <div class='swiper-container ' style='width:95vw;'>
            <div class='swiper-wrapper'>
                <div class='swiper-slide'>
                    <div class='card'>
                        <div class='row g-0'>
                            <div class='col-8'>
                            <img src='{$img_path}' alt='{$alt}' class='swiper-lazy img-fluid'>
                            </div>
                            <div class='col-4 d-flex justify-content-center align-items-center'>

                            
                                <div class='card-body d-flex flex-column justify-content-center align-items-center'>
                                    <div class='card-title display-4 mb-3'>{$g_title}</div>
                                    <div class='card-text'>
                                        <ul class='fs-3'>
                                            <li>{$media_type}</li>
                                            <li>{$mat_type}</li>
                                            <li>{$size_amount}</li>
                                            <li>{$g_year}</li>
                                        </ul>
                                        <a href='gallery.php'>Return To Gallery</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='swiper-slide'>
                    <div class='card'>
                        <div class='row g-0'>
                            <div class='col-8'>
                            <img src='{$img_BL_path}' alt='{$alt_BL}' class='swiper-lazy img-fluid'> 
                            </div>
                            <div class='col-4 d-flex justify-content-center align-items-center'>

                            
                                <div class='card-body d-flex flex-column justify-content-center align-items-center'>
                                    <div class='card-title display-4 mb-3'>{$g_title}</div>
                                    <div class='card-text'>
                                        <ul class='fs-3'>
                                            <li>{$media_type}</li>
                                            <li>{$mat_type}</li>
                                            <li>{$size_amount}</li>
                                            <li>{$g_year}</li>
                                        </ul>
                                        <a href='gallery.php'>Return To Gallery</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class='swiper-button-prev'></div>
                <div class='swiper-button-next'></div>
            </div>
        </div>
    </div>";
        }
        else{
            $card.="
            <div class='card'>
                <div class='row g-0'>
                    <div class='col-md-6'>
                        <img src='{$img_path}' alt='{$alt}' class='rounded-start img-fluid' />
                    </div>
                    <div class='col-md-6 d-flex justify-content-center align-items-center'>
                        <div class='card-body d-flex flex-column justify-content-center align-items-center'>
                            <div class='card-title display-4 mb-3'>{$g_title}</div>
                            <div class='card-text'>
                                <ul class='fs-3'>
                                    <li>{$media_type}</li>
                                    <li>{$mat_type}</li>
                                    <li>{$size_amount}</li>
                                    <li>{$g_year}</li>
                                </ul>
                                <a href='gallery.php'>Return to Gallery</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>";

            }
        }
        return $card;
    }

    



?>





