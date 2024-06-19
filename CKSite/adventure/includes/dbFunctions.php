<?php 
include_once "php_util/db.php";
include_once "cw/cw_read_write.php";

function create_mobile_gallery($connection){
    $gallery_sm="    
    <div class='gallery-sm'>
        <div class='row'>
            <div class='col-12 bulb d-flex justify-content-center align-items-center'>
    
                <div class='prongs-left'></div>
                <div class='cap-left'></div>
                <div class='tube'>off</div>
                <div class='cap-right'></div>
                <div class='prongs-right'></div>
    
            </div>
            <div class='col-12'>
                <div class='carousel slide'>
                    <div class='carousel-inner'>";

                    $gallery_query="SELECT g.gallery_id, g.gallery_title, m.media_type, gs.size_amount, g.gallery_orientation, mt.mat_type, g.is_blacklight, g.gallery_year, g.gallery_image, g.gallery_BL_image
FROM gallery g INNER JOIN media m ON g.gallery_media_id=m.media_id INNER JOIN gallery_sizes gs ON g.gallery_size=gs.size_id INNER JOIN material mt ON g.gallery_material_id=mt.mat_id";




$gallery_result=mysqli_query($connection,$gallery_query);




//count the rows of blacklight paintings
$count_query_blacklight="SELECT COUNT(gallery_id) AS total FROM gallery WHERE is_blacklight=1";
$countable_blacklight=mysqli_query($connection,$count_query_blacklight);
$count_row_blacklight=$countable_blacklight->fetch_assoc();
$count_down_blacklight=$count_row_blacklight['total'];

//count all the rows
$count_query="SELECT COUNT(gallery_id) AS total FROM gallery";
$countable=mysqli_query($connection,$count_query);
$count_row=$countable->fetch_assoc();
$count_down=$count_row['total'];

while($row=mysqli_fetch_assoc($gallery_result)){
    $g_id=$row['gallery_id'];
    $g_title=$row['gallery_title'];
    $g_BL_check=$row['is_blacklight'];
    $g_year=$row['gallery_year'];
    $g_image=$row['gallery_image'];
    $g_BL_image=$row['gallery_BL_image'];
    $size_amount=$row['size_amount'];
    $g_orient=$row['gallery_orientation'];
    $media_type=$row['media_type'];
    $mat_type=$row['mat_type'];

 

    
    $image_path="images/gallery/{$g_image}";
    $alt="image of ".$g_title;

    $img_id=str_replace(" ","",$g_title)."_img";
        $js_id="#".$img_id;

        $a_img_info_id_sm="#".$img_id."card";
        $card_img_info_id_sm=$img_id."card";

    

    if($count_down==$count_row['total']){
        $active="active";
    }
    else{
        $active="";
    }

    $count_down--;

    $gallery_sm.="
    <div class='carousel-item position-relative {$active}'>
        <div class='collapse multi-collapse position-absolute top' id='{$card_img_info_id_sm}'>
            <div class='card w-100'>
                <div class='card-body'>
                    <div class='card-title'>{$g_title}</div>
                    <div class='card-text'>
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

        if($g_BL_check==1){
    
    
            $count_down_blacklight--;
    

            $img_sm="<a href='{$a_img_info_id_sm}' data-bs-toggle='collapse'><img src='{$image_path}' alt='{$alt}' class='img-fluid blacklight' id='{$img_id}'></a>";
            $gallery_sm.=$img_sm."</div>";
    
    
           
    
        }
        else{

            $img_sm="<a href='{$a_img_info_id_sm}'><img src='{$image_path}' alt='{$alt}' class='img-fluid plain' id='{$img_id}'></a>";
            $gallery_sm.=$img_sm."</div>";
        
        }
    

}

$gallery_sm.="                    
</div>
</div>
</div>
</div>
</div>";

return $gallery_sm;
}

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
        // $g_orient=$row['gallery_orientation'];
        $media_type=$row['media_type'];
        $mat_type=$row['mat_type'];

        $alt="image of ".$g_title;

        $img_path="images/gallery/{$g_image}";
        $img_BL_path="images/gallery/{$g_BL_image}";



       
            
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
        </div>
        
        ";

            }
        }
        return $card;
    }

    



?>





