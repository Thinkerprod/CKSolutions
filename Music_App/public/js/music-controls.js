
console.log("js loaded")

    
    
    document.getElementById('playBtn').addEventListener('click',function (e){
        
        var song=document.getElementById('player')
        song.play();

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

    



// music_controls()