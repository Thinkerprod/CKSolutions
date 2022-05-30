
console.log("js loaded")
var songDuration="-:--"
var songElapsed="-:--"
var globalBarWidth=0
var myReq=""
var progBarWidthRate=""
var audioElement=""
var globalPath=""
var globalVolume=""



function createMusicPlayer(path){
    audioElement=new Audio(path)
    audioElement.volume=globalVolume
    var volumeHeight=Math.floor(audioElement.volume*100)+"%"
   
document.getElementById("volControl").style.height=volumeHeight
}

document.getElementById("speakerIcon").addEventListener("click",function (e){
    document.getElementById("volShowControl").classList.toggle("volShow")
})


setVolumeDefault(0.25)



    document.getElementById("elapse").innerText= songElapsed
    document.getElementById("songDur").innerText = songDuration
    
    
    document.getElementById('playBtn').addEventListener('click',function (e){play()})
    document.getElementById('stopBtn').addEventListener('click',function (e){stop()})    
    document.getElementById('pauseBtn').addEventListener('click',function (e){pause()})

    
function timeProgress(){

//Get elapsed time incrementing and display it
var elapsed=audioElement.currentTime
var minElapse=Math.floor(elapsed/60)
var secElapse=Math.floor(elapsed%60)
secElapse=('0'+secElapse).slice(-2)
document.getElementById("elapse").innerText=minElapse+":"+secElapse

var progBarWidthRate = ((elapsed*100)/audioElement.duration)
// console.log(progBarWidthRate)
document.getElementById("progBar").style.width=progBarWidthRate+"%"


window.requestAnimationFrame(timeProgress)
if(document.getElementById("progBar").style.width=="100%"){
    window.cancelAnimationFrame(myReq)
}

}

function play(){
    var song=audioElement
        song.play();
        var min=Math.floor(audioElement.duration/60)
        var sec=Math.floor(audioElement.duration%60)
        document.getElementById("songDur").innerText = min+":"+sec
        myReq=window.requestAnimationFrame(timeProgress)
}

function pause(){

    var song=audioElement
    if(!song.paused){
        console.log(song.paused)
        song.pause()
    }
    else{
        song.play()
    }

}

function stop(){
    var song=audioElement
        song.pause()
        song.currentTime=0
        window.cancelAnimationFrame(myReq)
        globalBarWidth=0
}

function setVolumeDefault(volumeDefault){
    
    globalVolume=volumeDefault
    // var volumeHeight=(audioElement.volume*100)+"%"
    // document.getElementById("volControl").style.height=volumeHeight
    
}



function increaseVolume(){
    if(audioElement.volume<1){
        var volumeLevel=globalVolume
        volumeLevel+=0.01
        globalVolume=volumeLevel
    audioElement.volume=volumeLevel
    var volumeHeight=Math.floor(volumeLevel*100)+"%"
    
document.getElementById("volControl").style.height=volumeHeight
document.getElementById("volLabel").innerText=volumeHeight
console.log(audioElement.volume)
    }
}

function decreaseVolume(){
if(audioElement.volume>0){
    var volumeLevel=globalVolume
        volumeLevel-=0.01
        globalVolume=volumeLevel
    audioElement.volume=volumeLevel
    var volumeHeight=Math.floor(volumeLevel*100)+"%"
    
document.getElementById("volControl").style.height=volumeHeight
document.getElementById("volLabel").innerText=volumeHeight
console.log(audioElement.volume)
}
}

document.getElementById("plus").addEventListener("click",function(e){
    increaseVolume()
})

document.getElementById("minus").addEventListener("click",function(e){
    decreaseVolume()
})

document.getElementById("mute").addEventListener("click", function (e){
    if(audioElement.muted==false){
        audioElement.muted=true
    }
    else{
        audioElement.muted=false
    }
})




