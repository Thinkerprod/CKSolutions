


$(document).ready(function(){
$(".AboutS").hide();
$(".AboutC").hide();


    $(".shauna").click(function (){
        $(".AboutS").toggle(250);
        $(".AboutC").hide(250);
    });
  

    $(".cory").click(function(){
        $(".AboutC").toggle(250);
        $(".AboutS").hide(250);
    });

    
});
 