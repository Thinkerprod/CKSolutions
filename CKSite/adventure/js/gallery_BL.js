var BL_set=0


function change_sources(array){
    console.log("here")
if(BL_set==0){
    BL_set=1
    console.log("here")

    for(var i=0;i<array.length;i++){
// var img_src=array[i][0]
var img_src_BL=array[i][1]
var img_id=array[i][2]
console.log(img_id)

if ($(img_id).length) {
    console.log("iffy")
    $(img_id).attr("src", img_src_BL);
    console.log($(img_id).attr("src")+" ebehgeeg"); // Check the updated src attribute
} else {
    console.log("Element not found for selector:", img_id);
}


    }
}
else{

    BL_set=0

    for(var i=0;i<array.length;i++){
        var img_src=array[i][0]
        var img_src_BL=array[i][1]
        var img_id=array[i][2]
        
        $(img_id).attr("src",img_src)
        
            }

}

}