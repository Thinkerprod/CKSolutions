<?php 
include "../../php_util/db.php";

// $query="SELECT * FROM ";


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

?>