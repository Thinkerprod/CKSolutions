<?php 

include_once "includes/gallery-header.php";
include_once "php_util/db.php";
$page="<div class='container-fluid'>
<div class='gallery_title d-flex flex-column justify-content-center align-items-center'>
    <h2 class='title-top'>Prism Expressions</h2>
    <h1 class='title-bottom'>Gallery</h1>
</div>";

$gallery_sm="    <div class='gallery-sm'>
<div class='row'>
    <div class='col-12 bulb d-flex justify-content-center align-items-center'>
        
        <div class='prongs-left'></div>
        <div class='cap-left'></div>
        <div class='tube'>off</div>
        <div class='cap-right'></div>
        <div class='prongs-right'></div>
        
    </div>
    <div class='col-12'>
        <!-- Slider main container -->
        <div class='swiper-container'>
        <!-- Additional required wrapper -->
            <div class='swiper-wrapper'>                        
            <!-- Slides -->";

$gallery_lg="    <div class='gallery-lg'>
<div class='row gy-2'>
    <div class='col-md-2 col-lg-3'>
        <div class='bulb vertical left'>
            <div class='prongs-top'></div>
            <div class='cap-top'></div>
            <div class='tube'>off</div>
            <div class='cap-bottom'></div>
            <div class='prongs-bottom'></div>
        </div>
    </div>";

$gallery_query="SELECT g.gallery_title, m.media_type, gs.size_amount, mt.mat_type, g.is_blacklight, g.gallery_year, g.gallery_image, g.gallery_BL_image
FROM gallery g INNER JOIN media m ON g.gallery_media_id=m.media_id INNER JOIN gallery_sizes gs ON g.gallery_size=gs.size_id INNER JOIN material mt ON g.gallery_material_id=mt.mat_id";

$gallery_result=mysqli_query($connection,$gallery_query);
while($row=mysqli_fetch_assoc($gallery_result)){
    $g_title=$row['gallery_title'];
    $g_BL_check=$row['is_blacklight'];
    $g_year=$row['gallery_year'];
    $g_image=$row['gallery_image'];
    $g_BL_image=$row['gallery_BL_image'];
    $size_amount=$row['size_amount'];
    $media_type=$row['media_type'];
    $mat_type=$row['mat_type'];

    $gallery_sm.="<div class='swiper-slide'>";

    $gallery_lg.="<div class='col-md-3 col-lg-2  d-flex justify-content-center align-items-center'>";


    $image_path="images/gallery/".$g_image;
    $alt="image of ".$g_title;

    $img_id=str_replace(" ","",$g_title);

    if($g_BL_check==1){
        
        $img_id_BL=str_replace(" ","",$g_title)."_BL";
        $alt_BL="Blacklight image of ".$g_title;
        $image_BL_path="images/gallery/".$g_BL_image;
        $img="<img src='{$image_path}' alt='{$alt}' class='img-fluid blacklight' id='{$img_id}'><img src='{$image_BL_path}' alt='{$alt_BL}' class='img-fluid blacklight BL-toggle'>";
        $gallery_sm.=$img."</div>";
        $gallery_lg.=$img."</div>";

    }
    else{
        $img="<img src='{$image_path}' alt='{$alt}' class='img-fluid' id='{$img_id}'>";

        $gallery_sm.=$img."</div>";
        $gallery_lg.=$img."</div>";
    }
}

$gallery_sm.="                    </div>
<!-- If we need pagination -->
<div class='swiper-pagination'></div>

<!-- If we need navigation buttons -->
<div class='swiper-button-prev'></div>
<div class='swiper-button-next'></div>

<!-- If we need scrollbar -->
<div class='swiper-scrollbar'></div>
</div>
</div>

</div>
</div>";

$gallery_lg.="            <div class='col-md-2 col-lg-3'>
<div class='bulb vertical right'>
        <div class='prongs-top'></div>
        <div class='cap-top'></div>
        <div class='tube'>off</div>
        <div class='cap-bottom'></div>
        <div class='prongs-bottom'></div>
    </div>
</div>

</div>
</div>
";

$page.=$gallery_lg."</div>";
echo $page;

include_once "includes/gallery_footer.php";

?>




                        



            

            <!-- <div class='col-md-8 col-lg-6 full-display-column'> -->
