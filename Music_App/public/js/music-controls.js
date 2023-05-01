
console.log("js loaded")
// var path='/public/Music/Pink Floyd/Wish You Were Here/1_ShineOnYouCrazyDiamond(PartsI-V).mp3'
var songDuration="-:--"
var songElapsed="-:--"
var globalBarWidth=0
var myReq=""
var progBarWidthRate=""
var audioElement=new Audio("/public/Music/Pink Floyd/Wish You Were Here/1_ShineOnYouCrazyDiamond(PartsI-V).mp3")
// var globalPath=""
var clickedPath=""
var countAlbumRows=''
$('td.fileColumn').each(function(){
    countAlbumRows++
})
var albumSongs=new Array(countAlbumRows)

var globalVolume=""
// Event.AT_TARGET

document.getElementById("listIcon").addEventListener("click",function(e){
    document.getElementById("albumInfo").classList.toggle("tableShow")
})

// createMusicPlayer(path)
$('tr').on('click',function(e){
    // $('div').html("triggered by "+e.currentTarget.nodeName)
    let file=$(e.target).closest('tr').find('td.fileColumn').text()
    // console.log(file+" was clicked")
    clickedPath="/public/Music/Pink Floyd/Wish You Were Here/"+file
    // var displayData=new Array(4)
    
        
        $.get("/request",{rowFile:file},function(data,status){
            // console.log(data+" is here now")
            console.log(status)
            songSelected(clickedPath,data)
        })
     
    
    // createMusicPlayer(clickedPath)
})
function createMusicPlayer(path){
    audioElement.src=path
    audioElement.load()
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
    
    
    document.getElementById('playBtn').addEventListener('click',function (){play()})
    document.getElementById('stopBtn').addEventListener('click',function (){stop()})    
    document.getElementById('pauseBtn').addEventListener('click',function (){pause()})
    

    
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
        // console.log(audioElement.duration)
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

function nextSong(){
    // var trackLastPlayed=0
    var i=0
$('td.fileColumn').each(function(){
    albumSongs[i]=$(this).text()
    i++
})
// console.log("sfdfd"+albumSongs[0])
var strSource=audioElement.src.split("/")

for(var j=0; j<albumSongs.length; j++){
    if(albumSongs[i]==strSource[strSource.length-1]){
        
    }
}
}

nextSong()



function increaseVolume(){
    if(audioElement.volume<1){
        var volumeLevel=globalVolume
        volumeLevel+=0.01
        globalVolume=volumeLevel
    audioElement.volume=volumeLevel
    var volumeHeight=Math.floor(volumeLevel*100)+"%"
    
document.getElementById("volControl").style.height=volumeHeight
document.getElementById("volLabel").innerText=volumeHeight
// console.log(audioElement.volume)
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
// console.log(audioElement.volume)
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



function songSelected(source,display){
    audioElement.src=source
    audioElement.load()
    
    $('#artistHeader').text(display[0])
    // console.log("aefagezrbgz")
    $('#albumHeader').text(display[1])
    $('#titleHeader').text(display[2])
    $('#albumC').attr('src',display[3])
    audioElement.addEventListener('loadeddata', ()=>{
        console.log(audioElement.duration)
        play()
    })
    
        // var min=Math.floor(audioElement.duration/60)
        // var sec=Math.floor(audioElement.duration%60)
        // document.getElementById("songDur").innerText = min+":"+sec
}



audioElement.addEventListener('ended',()=>{
    console.log(audioElement.duration)
    
},true)




