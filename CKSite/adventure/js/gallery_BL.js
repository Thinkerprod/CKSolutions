var BL_set=0

// $('.bulb').click(function(){
//     $('.tube').toggleClass('blacklight-on');
//     if($('#right').text()=='on'){
//         $('.tube').text('off');
//     }
//     else{
//         $('.tube').text('on');
//     }

//     $('.blacklight').toggleClass('highlight')
//     $('.plain').toggleClass('obscure')

//     if(BL_set==0){
//         console.log("shgerhhrhh")
//         $('source.BL_src').each(function(){
//             var src_BL=$(this).attr("srcset")
            
//             $(this).find("img").attr("src",src_BL)
//             console.log(src_BL)
//         })
//         BL_set=1
//     }
//     else{
//         $('source.regular').each(function(){
//             var src=$(this).attr("srcset")
//             $(this).siblings("img").attr("src",src)
//         })
//         BL_set=0
//     }



    

    
//     $('#right').toggleClass('rightTube');
//     $('#left').toggleClass('leftTube');
//     $('.cap, .prong').toggleClass('blacklight-on-caps-prongs');
//     $('body').toggleClass('blacklight-page');
// })



function change_sources(array){
if(BL_set==0){
    BL_set=1
    

    for(var i=0;i<array.length;i++){
var img_src=array[i][0]
var img_src_BL=array[i][1]
var img_id=array[i][2]

$(img_id).attr("src",img_src_BL)

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