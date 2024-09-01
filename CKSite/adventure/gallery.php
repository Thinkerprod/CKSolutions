
<?php 

include_once "includes/gallery-header.php";
include_once "php_util/db.php";
include_once "includes/dbFunctions.php";

$container="<div class='container-fluid mx-0 px-0'>";

echo $container;

$page="
<div class='gallery_title w-100 mx-0 d-flex flex-column justify-content-center align-items-center text-center gy-3'>
    <div class='title-top'>Prism  Expressions</div>
    <div class='spectrum'></div>

    <div class='title-bottom text-center w-100'>Gallery</div>
    <small class='text-center w-100 fs-5 mx-1'>All Artwork Seen Here Is Created By Cory Kutschker</small>
</div>
";



$gallery_lg="   
<div class='gallery-lg'>";

if(isset($_GET['id'])){
    $g_id=$_GET['id'];
    $gallery_lg.=display_gallery_info_lg($g_id,$gallery_display_read_stmt);
//     echo $gallery_lg;
}

$gallery_lg.="
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
        


            <div class='grid my-5'>
            <div class='grid-sizer'></div>

    ";

    $js_script="
    
    
    <script>
    $(document).ready(function(){
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
        $('.spectrum').toggleClass('spectrum-inverse')
        
        const blacklight_pairs=";

        $blacklight_pairs_array="[";

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

    $gallery_lg.="
        <div class='grid-item'>";

    
        $image_path="images/gallery/{$g_image}";
        $alt="image of ".$g_title;

        $img_id=str_replace(" ","",$g_title)."_img";
        $js_id="#".$img_id;



        if($g_BL_check==1){

            if($count_down_blacklight==1){
                // echo "here";
                $comma="";
                // $comma_value='nothing ';
            }
            else{
                $comma=",";
                // $comma_value='comma ';
            }


        $count_down_blacklight--;

        // $img_id_src=str_replace(" ","",$g_title)."_src";
        $img_id_BL=str_replace(" ","",$g_title)."_BL";
        $alt_BL="Blacklight image of ".$g_title;
        $image_BL_path="images/gallery/".$g_BL_image;
        $img_L="<a href='gallery.php?id={$g_id}'><img src='{$image_path}' alt='{$alt}' class='img-fluid blacklight' id='{$img_id}'></a>";
 
        
        $gallery_lg.=$img_L."</div>";

        $blacklight_pairs_array.="['{$image_path}','{$image_BL_path}','{$js_id}']".$comma;

    }
    else{
        $img_L="<a href='gallery.php?id={$g_id}'><img src='{$image_path}' alt='{$alt}' class='img-fluid plain' id='{$img_id}'></a>";
       
        
        $gallery_lg.=$img_L."</div>";
    }


}

$blacklight_pairs_array.="]";
// echo $blacklight_pairs_array;

$js_script.=$blacklight_pairs_array."

change_sources(blacklight_pairs);
$('#right').toggleClass('rightTube');
$('#left').toggleClass('leftTube');
$('.cap, .prong').toggleClass('blacklight-on-caps-prongs');
$('body').toggleClass('blacklight-page');
})
})

</script>";



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
    <script src='js/jquery-3.6.3.min.js'></script>
<script src='js/swiper.js'></script>
<script src='js/imagesLoaded.js'></script>
<script src='js/masonry_min.js'></script>
<script src='js/initialize-masonry.js'></script>
<script src='js/initialize-plugins.js'></script>
<script src='js/gallery_BL.js'></script>
";
$mobile=create_mobile_gallery($connection);
$page.=$gallery_lg.$mobile."</div>";
echo $page;
echo $js_script;

$bottom_tags="</body>
</html>";

include_once "includes/gallery_footer.php";

echo $bottom_tags;


?>





                    
    

    

                      



            


