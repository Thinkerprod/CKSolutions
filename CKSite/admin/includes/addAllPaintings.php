<?php
include_once("../php_util/db.php");
// include_once("../");
$files=scandir('../adventure/images/art');
$fileCount=sizeof($files);

$query="SELECT * FROM media";

$mediaQuery=mysqli_query($connection,$query);

confirmQuery($mediaQuery);
// echo $fileCount." number of files in art folder";
//  echo $files;
?>


<div class="add-all-container" id="addall">
        <div class="x-row"><button class="x-btn" id="closeAddAll">X</button></div>

        <form action="" method="post" enctype="multipart/form-data">



<?php
$option='';


while($row=mysqli_fetch_assoc($mediaQuery)){
    $mediaId=$row['media_id'];
    $mediaType=$row['media_type'];
    
    
    $option.='<option value="'.$mediaId.'">'.$mediaType.'</option>';
    
    
}
for($i=0;$i<$fileCount;$i++){
    $fileName=$files[$i];
    $path='../images/art/'.$fileName;
    $pathImage='../adventure/images/art/'.$fileName;
    
    if($files[$i]!=='.'&&$files[$i]!=='..'){
    $addPaintingForm='<div class="addAll-Row">';
        $addPaintingForm.='<div class="colForm-addAll">';
    
    
         $addPaintingForm.='<label for="paintTitle">Title</label>';
         $addPaintingForm.='<input type="text" name="paintTitle'.$i.'" id="paintTitle'.$i.'">';
         $addPaintingForm.='<label for="paintMedia">Media</label>';
         $addPaintingForm.='<select name="paintMedia'.$i.'" id="paintMedia'.$i.'">';
         
         $addPaintingForm.=$option;
        $addPaintingForm.='</select>';
         $addPaintingForm.='<label for="isBlacklight">isBlacklight</label>';
         $addPaintingForm.='<input type="checkbox" name="isBlacklight'.$i.'" id="isBlacklight'.$i.'" checked="false">';
         $addPaintingForm.='<label for="paintYear">Year</label>';
         $addPaintingForm.='<input type="date" name="paintYear'.$i.'" id="paintYear'.$i.'">';
         $addPaintingForm.='<label for="paintMaterial">Material</label>';
         $addPaintingForm.='<input type="text" name="paintMaterial'.$i.'" id="paintMaterial'.$i.'">';
         $addPaintingForm.='<label for="paintStatus">Status</label>';
         $addPaintingForm.='<input type="text" name="paintStatus'.$i.'" id="paintStatus'.$i.'">';
         $addPaintingForm.='<label for="paintImage">File Path</label>';
         $addPaintingForm.='<input type="text" name="paintImage'.$i.'" id="paintImage'.$i.'" value="'.$path.'">';
         $addPaintingForm.='<label for="paintTags">Tags</label>';
         $addPaintingForm.='<input type="text" name="paintTags'.$i.'" id="paintTags'.$i.'">';
    
        $addPaintingForm.='</div>';
    
        $addPaintingForm.='<div class="colImg-add">';
            $addPaintingForm.='<img src="'.$pathImage.'" alt="" class="img-addAll">';
        $addPaintingForm.='</div>';
    $addPaintingForm.='</div>';
    echo $addPaintingForm;
    }
}

?>



<input type="submit" name="save_all" value="Save">
</form>
</div>

<?php 

if(isset($_POST['save_all'])){
    for($i=0;$i<$fileCount;$i++){
      $paintTitle = $_POST['paintTitle'.$i];
      $paintMedia = $_POST['paintMedia'.$i];
      $isBlacklight = $_POST['isBlacklight'.$i];
      $paintYear = $_POST['paintYear'.$i];
      $paintMaterial = $_POST['paintMaterial'.$i];
      $paintStatus = $_POST['paintStatus'.$i];
      $paintImage = $_POST['paintImage'.$i];
      $paintTags = $_POST['paintTags'.$i];

        $addAll_query="INSERT INTO paintings(paint_title,paint_media_id,is_blacklight,paint_year,paint_material,paint_status,paint_image,paint_tags) 
        VALUES('{$paint_title}','{$paint_media}','{$isBlacklight}','{$paint_year}','{$paint_material}','{$paint_status}','{$path}','{$paint_tags}')";

        $test_query=mysqli_query($connection,$addAll_query);
        confirmQuery($test_query);

    }

}



header("Location: ../../admin");
?>

