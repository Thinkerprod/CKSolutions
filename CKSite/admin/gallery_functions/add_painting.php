<?php 
include "../../php_util/db.php";
include "../includes/addPainting_header.php";
$query="SELECT * FROM media";

$mediaQuery=mysqli_query($connection,$query);

confirmQuery($mediaQuery);

?>
<title>Add Painting</title>
</head>
<body>
<div class="addContainer">
        

        <form action="" method="post" enctype="multipart/form-data">
<?php 

$option='';


while($row=mysqli_fetch_assoc($mediaQuery)){
    $mediaId=$row['media_id'];
    $mediaType=$row['media_type'];
    
    
    $option.='<option value="'.$mediaId.'">'.$mediaType.'</option>';
    
    
}


$addPaintingForm='<div class="add-Row">';
$addPaintingForm.='<div class="colForm-add">';


 $addPaintingForm.='<label for="paintTitle">Title</label>';
 $addPaintingForm.='<input type="text" name="paintTitle" id="paintTitle">';
 $addPaintingForm.='<label for="paintImg">Choose image</label>';
 $addPaintingForm.='<input type="file" name="paintImg" id="paintImg">';
 $addPaintingForm.='<label for="paintMedia">Media</label>';
 $addPaintingForm.='<select name="paintMedia" id="paintMedia">';
 
 $addPaintingForm.=$option;
$addPaintingForm.='</select>';
 $addPaintingForm.='<label for="isBlacklight">isBlacklight</label>';
 $addPaintingForm.='<input type="checkbox" name="isBlacklight" id="isBlacklight" checked="false">';
 $addPaintingForm.='<label for="paintYear">Year</label>';
 $addPaintingForm.='<input type="number" name="paintYear" id="paintYear">';
 $addPaintingForm.='<label for="paintMaterial">Material</label>';
 $addPaintingForm.='<input type="text" name="paintMaterial" id="paintMaterial">';
 $addPaintingForm.='<label for="paintStatus">Status</label>';
 $addPaintingForm.='<input type="text" name="paintStatus" id="paintStatus">';
 $addPaintingForm.='<label for="paintTags">Tags</label>';
 $addPaintingForm.='<input type="text" name="paintTags" id="paintTags">';
 $addPaintingForm.='<input type="submit" name="submit_paint" id="submit_paint" value="Save Painting">';
$addPaintingForm.='</div>';


$addPaintingForm.='</div>';

echo $addPaintingForm;


if(isset($_POST['submit_paint'])){
    $paint_title=$_POST['paintTitle'];
    $paint_media=$_POST['paintMedia'];
    $isBlacklight=$_POST['isBlacklight'];
    $paint_year=$_POST['paintYear'];
    $paint_material=$_POST['paintMaterial'];
    $paint_status=$_POST['paintStatus'];
    $paint_tags=$_POST['paintTags'];

    $paint_image=$_FILES['update_image']['name'];
    $paint_image_temp=$_FILES['update_image']['tmp_name'];

    $moveImgPath='../adventure/images/art/'.$paint_image;
    $path='../images/art/'.$paint_image;
    move_uploaded_file($paint_image_temp,$moveImgPath);

    $addpainting_query="INSERT INTO paintings(paint_title,paint_media_id,is_blacklight,paint_year,paint_material,paint_status,paint_image,paint_tags) 
    VALUES('{$paint_title}','{$paint_media}','{$isBlacklight}','{$paint_year}','{$paint_material}','{$paint_status}','{$path}','{$paint_tags}')";

    $test_query=mysqli_query($connection,$addpainting_query);
    confirmQuery($test_query);
    header("Location: ../../admin");
}

?>

<script type="typescript/javascript">
        
        var input=document.querySelector("#paintImg");
        input.addEventListener("change", function(){
        const postImageFile=input.files.name;
        if(postImageFile){const imgURL=URL.createObjectURL(postImageFile);
            var imgTag=document.createElement("img");
            imgTag.width="50px";
            imgTag.height="50px";
            imgTag.src=imgURL;}
       
      
        });
        
        
       
        </script>

        </body>
</html>