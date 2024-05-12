<?php 
function create_writing($filepath,$content){
    
$file=fopen($filepath,"w");
fwrite($file,$content);
fclose($file);
}

function read_writing($filepath){

    $file=fopen($filepath,"r");
    $content=fread($file,filesize($filepath));
    fclose($file);
    return $content;
}
function remove_writing($filepath){

    unlink($filepath);

}

?>