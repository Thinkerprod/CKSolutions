
<?php 

include_once "includes/gallery-header.php";
include_once "php_util/db.php";
include_once "includes/dbFunctions.php";

$container="<div class='container-fluid'>";

echo $container;

$page="
<div class='gallery_title d-flex flex-column justify-content-center align-items-center gy-3'>
<div class='title-top'>Prism  Expressions</div>
<div class='spectrum'></div>

<div class='title-bottom'>Gallery</div>
<small>All Artwork Seen Here Is Created By Cory Kutschker</small>
</div>
";

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

$gallery_lg="   
<div class='gallery-lg'>";
if(isset($_GET['id'])){
    $g_id=$_GET['id'];
    $gallery_lg.=display_gallery_info_lg($g_id,$gallery_display_read_stmt);
    echo $gallery_lg;
}
$gallery_lg="
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
        $('.spectrum').toggleClass('spectrum-inverse')
        
        const blacklight_pairs=[";

$gallery_query="SELECT g.gallery_id, g.gallery_title, m.media_type, gs.size_amount, g.gallery_orientation, mt.mat_type, g.is_blacklight, g.gallery_year, g.gallery_image, g.gallery_BL_image
FROM gallery g INNER JOIN media m ON g.gallery_media_id=m.media_id INNER JOIN gallery_sizes gs ON g.gallery_size=gs.size_id INNER JOIN material mt ON g.gallery_material_id=mt.mat_id";

$count_query="SELECT COUNT(gallery_id) AS total FROM gallery";

$gallery_result=mysqli_query($connection,$gallery_query);
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

    $gallery_lg.="<div class='grid-item'>";

    
    $image_path="images/gallery/{$g_image}";
    $alt="image of ".$g_title;

    $img_id=str_replace(" ","",$g_title);
        $js_id="#".$img_id;

        $a_img_info_id_sm="#".$img_id."card";
        $card_img_info_id_sm=$img_id."card";

    

    if($count_down==$count_row['total']){
        $active="active";
    }
    else{
        $active="";
    }

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


    if($g_BL_check==1){
        $img_id_src=str_replace(" ","",$g_title)."_src";
        $img_id_BL=str_replace(" ","",$g_title)."_BL";
        $alt_BL="Blacklight image of ".$g_title;
        $image_BL_path="images/gallery/".$g_BL_image;
        $img_L="<a href='gallery.php?id={$g_id}'><img src='{$image_path}' alt='{$alt}' class='img-fluid blacklight' id='{$img_id}'></a>";
        $img_sm="<a href='{$a_img_info_id_sm}' data-bs-toggle='collapse'><img src='{$image_path}' alt='{$alt}' class='img-fluid blacklight' id='{$img_id}'></a>";
        $gallery_sm.=$img_sm."</div>";
        $gallery_lg.=$img_L."</div>";

        $js_script.="['{$image_path}','{$image_BL_path}','{$js_id}']".$comma;

    }
    else{
        $img_L="<a href='gallery.php?id={$g_id}'><img src='{$image_path}' alt='{$alt}' class='img-fluid plain' id='{$img_id}'></a>";
        $img_sm="<a href='{$a_img_info_id_sm}'><img src='{$image_path}' alt='{$alt}' class='img-fluid plain' id='{$img_id}'></a>";
        $gallery_sm.=$img_sm."</div>";
        $gallery_lg.=$img_L."</div>";
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

$gallery_sm.="                    
</div>
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

$page.=$gallery_sm.$gallery_lg."</div>";
echo $page;


$bottom_tags="</body>
</html>";

include_once "includes/gallery_footer.php";
echo $js_script;
echo $bottom_tags;


?>




</div>
</div>
    

    

                      



            


