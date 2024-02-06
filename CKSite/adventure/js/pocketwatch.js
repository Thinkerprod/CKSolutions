function secHandAngle(sec){
    var angle =(360/60)*sec
    return angle
}
function minHandAngle(min){
    var angle=(360/60)*min
    return angle
}
function hourHandAngle(hours, minutes){
    var angle=(30*hours)+(0.5*minutes)
    return angle
}


//Set the clock
function setClock(){
    let day=new Date();
let h=day.getHours();
let seconds=day.getSeconds();
let minutes=day.getMinutes();

   //set the angle of clock hands 
   
document.getElementById("hour").style.transform="rotate("+(secHandAngle(seconds))+"deg)";
document.getElementById("minute").style.transform="rotate("+(minHandAngle(minutes))+"deg)";
    document.getElementById("second").style.transform="rotate("+(hourHandAngle(h,minutes))+"deg)";
}


//Get ticking
function update(){
    let day=new Date();
    let h=day.getHours();
    let seconds=day.getSeconds();
    let minutes=day.getMinutes();

    document.getElementById("second").style.transform="rotate("+(seconds*6)+"deg)";
    document.getElementById("minute").style.transform="rotate("+(minutes*6)+"deg)";
    document.getElementById("hour").style.transform="rotate("+(hourHandAngle(h,minutes))+"deg)";

    


    
    window.requestAnimationFrame(update);
}

window.requestAnimationFrame(update);




