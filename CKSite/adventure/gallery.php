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

$gallery_lg="   
<div class='gallery-lg'>
    <div class='row gy-2'>
        <div class='col-md-2 col-lg-3 d-flex justify-content-center'>
            <div class='bulb vertical'>
                <div class='prongs-top prongs'>
                    <div class='prong-v prong'></div>
                    <div class='prong-v prong'></div>
                </div>
                <div class='cap'></div>
                <div class='tube' id='left'>off</div>
                <div class='cap'></div>
                <div class='prongs-bottom prongs'>
                    <div class='prong-v prong'></div>
                    <div class='prong-v prong'></div>
                </div>
            </div>
        </div>
        <div class='col-md-8 col-lg-6'>
            <div class='grid'>
            <div class='grid-sizer'></div>

    ";

    $js_script="<script>

    $('.bulb').click(function(){
        $('.tube').toggleClass('blacklight-on');
        if($('#right').text()=='on'){
            $('.tube').text('off');
        }
        else{
            $('.tube').text('on');
        }
        $('.blacklight').toggleClass('highlight')
        $('.plain').toggleClass('obscure')
        
        const blacklight_pairs=[";

$gallery_query="SELECT g.gallery_title, m.media_type, gs.size_amount, g.gallery_orientation, mt.mat_type, g.is_blacklight, g.gallery_year, g.gallery_image, g.gallery_BL_image
FROM gallery g INNER JOIN media m ON g.gallery_media_id=m.media_id INNER JOIN gallery_sizes gs ON g.gallery_size=gs.size_id INNER JOIN material mt ON g.gallery_material_id=mt.mat_id";

$gallery_result=mysqli_query($connection,$gallery_query);
$countable=$row=mysqli_fetch_array($gallery_result);
$count_down=count($countable);
while($row=mysqli_fetch_assoc($gallery_result)){
    $g_title=$row['gallery_title'];
    $g_BL_check=$row['is_blacklight'];
    $g_year=$row['gallery_year'];
    $g_image=$row['gallery_image'];
    $g_BL_image=$row['gallery_BL_image'];
    $size_amount=$row['size_amount'];
    $g_orient=$row['gallery_orientation'];
    $media_type=$row['media_type'];
    $mat_type=$row['mat_type'];

    $gallery_sm.="<div class='swiper-slide'>";


    $count_down--;

    // if($g_orient==1){
    //     $gallery_lg.="<div class='grid-sizer'></div><div class='grid-item'>";

    // }
    // else{
    //     $gallery_lg.="<div class='grid-sizer'></div><div class='grid-item grid-item--height2'>";
    // }
        if($count_down==1){
            $comma="";
        }
        else{
            $comma=",";
        }
    $gallery_lg.="<div class='grid-item'>";


    $image_path="images/gallery/{$g_image}";
    $alt="image of ".$g_title;

    $img_id=str_replace(" ","",$g_title);
        $js_id="#".$img_id;

    if($g_BL_check==1){
        $img_id_src=str_replace(" ","",$g_title)."_src";
        $img_id_BL=str_replace(" ","",$g_title)."_BL";
        $alt_BL="Blacklight image of ".$g_title;
        $image_BL_path="images/gallery/".$g_BL_image;
        $img="<img src='{$image_path}' alt='{$alt}' class='img-fluid blacklight' id='{$img_id}'>";
        $gallery_sm.=$img."</div>";
        $gallery_lg.=$img."</div>";

        $js_script.="['{$image_path}','{$image_BL_path}','{$js_id}']".$comma;

    }
    else{
        $img="<img src='{$image_path}' alt='{$alt}' class='img-fluid plain' id='{$img_id}'>";

        $gallery_sm.=$img."</div>";
        $gallery_lg.=$img."</div>";
    }

//     <img src='{$image_BL_path}' alt='{$alt_BL}' class='img-fluid blacklight BL-toggle'>
}

$js_script.="]

change_sources(blacklight_pairs)
$('#right').toggleClass('rightTube');
$('#left').toggleClass('leftTube');
$('.cap, .prong').toggleClass('blacklight-on-caps-prongs');
$('body').toggleClass('blacklight-page');
})
</script>";

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

$gallery_lg.="
</div>
</div>
    <div class='col-md-2 col-lg-3 d-flex justify-content-center'>
        <div class='bulb vertical'>
            <div class='prongs-top prongs'>
                <div class='prong-v prong'></div>
                <div class='prong-v prong'></div>
            </div>
            <div class='cap'></div>
            <div class='tube' id='right'>off</div>
            <div class='cap'></div>
            <div class='prongs-bottom prongs'>
                 <div class='prong-v prong'></div>
                 <div class='prong-v prong'></div>
            </div>
        </div>
    </div>

</div>
</div>
";

$page.=$gallery_lg."</div>";
echo $page;
echo count($countable);

$bottom_tags="</body>
</html>";

include_once "includes/gallery_footer.php";
echo $js_script;
echo $bottom_tags;


?>





    

    

                        



            

            <!-- <div class='col-md-8 col-lg-6 full-display-column'> -->
