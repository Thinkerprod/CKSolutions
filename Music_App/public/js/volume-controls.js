var volumeHeight=""
var volumeLevel=0.25

var playerVolume=document.getElementById("player").volume


playerVolume=volumeLevel
console.log(playerVolume)
volumeHeight=(volumeLevel*100)+"%"
document.getElementById("volControl").style.height=volumeHeight

document.getElementById("plus").addEventListener("click",function(e){
    if(playerVolume<1){volumeLevel+=0.01
    
    playerVolume=volumeLevel
    volumeHeight=Math.floor(volumeLevel*100)+"%"
    
document.getElementById("volControl").style.height=volumeHeight
document.getElementById("volLabel").innerText=volumeHeight
console.log(playerVolume)}

})

document.getElementById("minus").addEventListener("click",function(e){
    if(volumeLevel>=0){volumeLevel-=0.01
    playerVolume=volumeLevel
    volumeHeight=Math.floor(volumeLevel*100)+"%"
document.getElementById("volControl").style.height=volumeHeight
document.getElementById("volLabel").innerText=volumeHeight
    }
})