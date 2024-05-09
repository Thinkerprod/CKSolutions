<?php 
function create_writing($filename,$content){
    $filepath="../../cw/".$filename;
$file=fopen($filepath,"w");
fwrite($file,$content);
fclose($file);
}

function read_writing($filename){
    $filepath="../../cw/".$filename;
    $file=fopen($filepath,"r");
    $content=fread($file,filesize($filepath));
    fclose($file);
    return $content;
}
function remove_writing($filename){
    $filepath="../../cw/".$filename;
    unlink($filepath);

}

?>