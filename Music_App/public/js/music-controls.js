
console.log("js loaded")

    document.getElementById("songDur").innerText = document.getElementById("player").duration
    
    document.getElementById('playBtn').addEventListener('click',function (e){
        
        var song=document.getElementById('player')
        song.play();
        var min=Math.floor(document.getElementById("player").duration/60)
        var sec=Math.floor(document.getElementById("player").duration%60)
        document.getElementById("songDur").innerText = min+":"+sec

        

    })
    document.getElementById('stopBtn').addEventListener('click',function (e){

        const song=document.getElementById('player')
        song.pause()
        song.currentTime=0

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



}


