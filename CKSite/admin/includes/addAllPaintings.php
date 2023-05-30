<?php
include_once("../php_util/db.php");
// include_once("../");
$files=scandir('../adventure/images/art');
$fileCount=sizeof($files);

$query="SELECT * FROM media";

$mediaQuery=mysqli_query($connection,$query);


// echo $fileCount." number of files in art folder";
//  echo $files;
?>


<div class="add-all-container" id="addall">
        <div class="x-row"><button class="x-btn" id="closeAddAll">X</button></div>

        <form action="addAll-functions.php" method="post">



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
         $addPaintingForm.='<input type="text" name="paintTitle" id="paintTitle'.$i.'">';
         $addPaintingForm.='<label for="paintMedia">Media</label>';
         $addPaintingForm.='<select name="paintMedia" id="paintMedia'.$i.'">';
         
         $addPaintingForm.=$option;
        $addPaintingForm.='</select>';
         $addPaintingForm.='<label for="isBlacklight">isBlacklight</label>';
         $addPaintingForm.='<input type="checkbox" name="isBlacklight" id="isBlacklight'.$i.'" checked="false">';
         $addPaintingForm.='<label for="paintYear">Year</label>';
         $addPaintingForm.='<input type="number" name="paintYear" id="paintYear'.$i.'">';
         $addPaintingForm.='<label for="paintMaterial">Material</label>';
         $addPaintingForm.='<input type="text" name="paintMaterial" id="paintMaterial'.$i.'">';
         $addPaintingForm.='<label for="paintStatus">Status</label>';
         $addPaintingForm.='<input type="text" name="paintStatus" id="paintStatus'.$i.'">';
         $addPaintingForm.='<label for="paintImage">File Path</label>';
         $addPaintingForm.='<input type="text" name="paintImage" id="paintImage'.$i.'" value="'.$path.'">';
         $addPaintingForm.='<label for="paintTags">Tags</label>';
         $addPaintingForm.='<input type="text" name="paintTags" id="paintTags'.$i.'">';
    
        $addPaintingForm.='</div>';
    
        $addPaintingForm.='<div class="colImg-addAll">';
            $addPaintingForm.='<img src="'.$pathImage.'" alt="" class="img-addAll">';
        $addPaintingForm.='</div>';
    $addPaintingForm.='</div>';
    echo $addPaintingForm;
    }
}

?>



<input type="button" value="Save">
</form>
</div>

