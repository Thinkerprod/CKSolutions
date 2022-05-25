
console.log("js loaded")
var songDuration="-:--"
var songElapsed="-:--"
var globalBarWidth=0
var myReq=""
var progBarWidthRate=""

    document.getElementById("elapse").innerText= songElapsed
    document.getElementById("songDur").innerText = songDuration
    
    
    document.getElementById('playBtn').addEventListener('click',function (e){
        // progBarWidthRate = (100/document.getElementById("player").duration)
        var song=document.getElementById('player')
        song.play();
        var min=Math.floor(document.getElementById("player").duration/60)
        var sec=Math.floor(document.getElementById("player").duration%60)
        document.getElementById("songDur").innerText = min+":"+sec
        myReq=window.requestAnimationFrame(timeProgress)
                


    })
    document.getElementById('stopBtn').addEventListener('click',function (e){

        const song=document.getElementById('player')
        song.pause()
        song.currentTime=0
        window.cancelAnimationFrame(myReq)
        globalBarWidth=0


    })    
    document.getElementById('pauseBtn').addEventListener('click',function (e){

        const song=document.getElementById('player')
        if(!song.paused){
            console.log(song.paused)
            song.pause()
        }
        else{
            song.play()
        }
        
        

    })

    
function timeProgress(){

//Get elapsed time incrementing and display it
var elapsed=document.getElementById("player").currentTime
var minElapse=Math.floor(elapsed/60)
var secElapse=Math.floor(elapsed%60)
secElapse=('0'+secElapse).slice(-2)
document.getElementById("elapse").innerText=minElapse+":"+secElapse

var progBarWidthRate = ((elapsed*100)/document.getElementById("player").duration)
// console.log(progBarWidthRate)
document.getElementById("progBar").style.width=progBarWidthRate+"%"


window.requestAnimationFrame(timeProgress)
if(document.getElementById("progBar").style.width=="100%"){
    window.cancelAnimationFrame(myReq)
}

}


