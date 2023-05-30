

// var path='/public/Music/Pink Floyd/Wish You Were Here/1_ShineOnYouCrazyDiamond(PartsI-V).mp3'
var currentSong='1_ShineOnYouCrazyDiamond(PartsI-V).mp3'
var currentArtist='Pink Floyd'
var currentAlbum='Wish You Were Here'
var playlistIndex=0
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
let chosenArtist=""
var chosenAlbum=""

document.getElementById("listIcon").addEventListener("click",function(e){

    document.getElementById("albumInfo").classList.toggle("tableHide")
    document.getElementById("albumInfo").classList.toggle("tableShow")
})

document.getElementById('visIcon').addEventListener('click',()=>{
    console.log("clicked")
    $('#openVisContainer').toggleClass('openVis')
})

document.getElementById('closeBtnId').addEventListener('click',()=>{
    $('#openVisContainer').toggleClass('openVis')
})

$('#switch').on('click', ()=>{
    $('.musicLibrary').toggleClass('openDrawer')
    $('.musicLibraryContainer').toggleClass('hideMusicLibrary')
    $('.musicLibraryContainer').toggleClass('showMusicLibrary')
})

$('.artistContainer').on('click',function(e){
    chosenArtist=$(e.target).closest('.artistChoice').text()
    console.log(chosenArtist)
    $(e.target).closest('.artistContainer').toggleClass('expandArtist')
    // $(e.target).closest('.artistContainer').toggleClass('removeActivity')
    $(e.target).closest('.artistContainer').children('.albumChoices').toggleClass('showAlbums')
    // $('.artistContainer').not(this).toggleClass('expandArtist')
    $('.artistContainer').not(this).removeClass('expandArtist')
    $('.artistContainer').not(this).children('.albumChoices').removeClass('showAlbums')
})

$('.chooseAlbum').on('click',(e)=>{
    chosenAlbum=$(e.target).closest('.chooseAlbum').text()
    $('.musicLibrary').toggleClass('openDrawer')
    $('.musicLibraryContainer').toggleClass('hideMusicLibrary')
    $('.musicLibraryContainer').toggleClass('showMusicLibrary')
    // console.log(chosenArtist)
    var chosenMusic=[chosenArtist,chosenAlbum]
    currentArtist=chosenMusic[0]
    currentAlbum=chosenMusic[1]
    $.get('/chosenmusic',{chosen:chosenMusic},function(data,status){


        $('#albumC').attr('src',data[0][6])
        $('#artistHeader').text(data[0][3])
        $('#albumHeader').text(data[0][4])
        $('#titleHeader').text(data[0][2])


        var tr='<tr>'
       tr+=' <th class="fileColumn">file</th>'
       tr+='<th>Track</th>'
       tr+='<th>Song</th>'
       tr+='<th>Artist</th>'
       tr+='<th>Album</th>'
       tr+='<th>Year</th>'
       tr+='</tr>'


    //    tr+='<tr class="albumRow">'
    //    trAlbum+=''
        
            $('table').empty()
            // $('table').append(trH)
            
        
                for(var i=0; i<data.length; i++){
                    tr+='<tr class="albumRow">'
                    tr+='<td class="fileColumn">'+data[i][0]
                    tr+='</td>'
                    tr+='<td class="trackColumn">'+data[i][1]
                    tr+='</td>'
                    tr+='<td class="songColumn">'+data[i][2]
                    tr+='</td>'
                    tr+='<td class="artistColumn">'+data[i][3]
                    tr+='</td>'
                    tr+='<td class="albumColumn">'+data[i][4]
                    tr+='</td>'
                    tr+='<td class="yearColumn">'+data[i][5]
                    tr+='</td>'
                    tr+='<td class="playColumn"><div class="playBtn">'
                    tr+='</td>'
                    tr+='</tr>'

                    
                }
                console.log(data)
                // tr+='</table>'
                $('table').append(tr)


        // console.log('shhgshrhbr'+chosenMusic[0])
    var chosenPath="/public/Music/"+chosenMusic[0]+"/"+chosenAlbum+"/"+data[0][0]
    currentSong=data[0][0]
    currentArtist=chosenMusic[0]
    currentAlbum=chosenAlbum
    audioElement.src=chosenPath
    audioElement.load()
    audioElement.addEventListener('loadeddata', ()=>{
        console.log(audioElement.duration)
        play(audioElement)
    })
    console.log(status)
    })


})

// createMusicPlayer(path)
$('tr.albumRow').on('click',function(e){
    console.log("aaaaaaaaaaaa")
    // $('div').html("triggered by "+e.currentTarget.nodeName)
    let file=$(e.target).closest('tr').find('td.fileColumn').text()
    let artist=$(e.target).closest('tr').find('td.artistColumn').text()
    let album=$(e.target).closest('tr').find('td.albumColumn').text()
    playlistIndex=($(e.target).closest('tr').find('td.trackColumn').text())-1
    // console.log(file+" is index "+playlistIndex)
    console.log(file+" was clicked")
    clickedPath="/public/Music/"+artist+"/"+album+"/"+file
    // var displayData=new Array(4)
    currentSong=file
        var clickedRow=[file,album,artist]
        $.get("/request",{rowData:clickedRow},function(data,status){
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


setVolumeDefault(0.5)

    document.getElementById("elapse").innerText= songElapsed
    document.getElementById("songDur").innerText = songDuration
    
    
    document.getElementById('playBtn').addEventListener('click',function (){play(audioElement)})
    document.getElementById('stopBtn').addEventListener('click',function (){stop()})    
    document.getElementById('pauseBtn').addEventListener('click',function (){pause()})
    document.getElementById('prevBtn').addEventListener('click',function(){
        prevSong(currentArtist,currentAlbum)
    })
    document.getElementById('nextBtn').addEventListener('click',function(){
        nextSong(currentArtist,currentAlbum)
    })
    

    
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

function play(audioElement){
    var song=audioElement
    var playPath=audioElement.src
    playPath=playPath.split('/')
    currentSong=playPath[playPath.length-1]
    console.log(currentSong+" is playing")
        song.play();
        // console.log(audioElement.duration)
        var min=Math.floor(audioElement.duration/60)
        var sec=Math.floor(audioElement.duration%60)
        document.getElementById("songDur").innerText = min+":"+sec
        myReq=window.requestAnimationFrame(timeProgress)
        visualizerStart(song)
}

function pause(){

    var song=audioElement
    if(!song.paused){
        // console.log(song.paused)
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

function prevSong(currentArtist,currentAlbum){
        
        var i=0
        $('td.fileColumn').each(function(){
        albumSongs[i]=$(this).text()
        i++
        })
   
        // var strSource=audioElement.src.split("/")
        
        
            if(albumSongs[playlistIndex]!=(albumSongs[0])){
                var nextIndex=playlistIndex-1
                var prev=albumSongs[nextIndex]
                
                
                
                var pathInfo=[prev,currentAlbum,currentArtist]
                // console.log(next+" is queued")
                $.get("/requestprev",{prevFile:pathInfo},function(data,status){
                    // console.log(data+" is here now")
                    console.log(status)
                    var display=data
                    $('#artistHeader').text(display[0])
                    // console.log("aefagezrbgz")
                    $('#albumHeader').text(display[1])
                    $('#titleHeader').text(display[2])
                    $('#albumC').attr('src',display[3])
                })
                audioElement.src='/public/Music/'+currentArtist+'/'+currentAlbum+'/'+prev
                audioElement.load()
                audioElement.addEventListener('loadeddata', ()=>{
                    // console.log(audioElement.duration)
                    playlistIndex--
                currentSong=albumSongs[playlistIndex]
                    play(audioElement)

                })
                
            }
            else{
                console.log("You're already at the start")
            }
}

function nextSong(currentArtist,currentAlbum){
    // var trackLastPlayed=0
    var i=0
    $('td.fileColumn').each(function(){
    albumSongs[i]=$(this).text()
    i++
    })
// console.log("sfdfd"+albumSongs[0])
    // var strSource=audioElement.src.split("/")
    // var currentSong=strSource[strSource.length-1]
    
        if(albumSongs[playlistIndex]!=(albumSongs.length-1)){
            var nextIndex=playlistIndex+1
            var next=albumSongs[nextIndex]
            // console.log(nextSong+" is next")
            
            
            var pathInfo=[next,currentAlbum,currentArtist]
            // console.log(next+" is queued")
            $.get("/requestnext",{nextFile:pathInfo},function(data,status){
                // console.log(data+" is here now")
                console.log(status)
                var display=data
                $('#artistHeader').text(display[0])
                // console.log("aefagezrbgz")
                $('#albumHeader').text(display[1])
                $('#titleHeader').text(display[2])
                $('#albumC').attr('src',display[3])
            })
            audioElement.src='/public/Music/'+currentArtist+'/'+currentAlbum+'/'+next
            // console.log()
            audioElement.load()
            audioElement.addEventListener('loadeddata', ()=>{
                // console.log(audioElement.duration)
                playlistIndex++
            currentSong=albumSongs[playlistIndex]
                play(audioElement)
            })
            
        }
        else{
            console.log("You're already at the end")
        }
    
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
    visualizerStart(audioElement)
    $('#artistHeader').text(display[0])
    // console.log("aefagezrbgz")
    $('#albumHeader').text(display[1])
    $('#titleHeader').text(display[2])
    $('#albumC').attr('src',display[3])
    audioElement.addEventListener('loadeddata', ()=>{
        // console.log(audioElement.duration)
        play(audioElement)
    })
    
        // var min=Math.floor(audioElement.duration/60)
        // var sec=Math.floor(audioElement.duration%60)
        // document.getElementById("songDur").innerText = min+":"+sec
}

function skipToEnd(){
    audioElement.currentTime=audioElement.duration-3;
}

audioElement.addEventListener('ended',()=>{
    // console.log(audioElement.duration)
console.log("ended")
    nextSong()
},true)

function visualizerStart(audioElement){
    let audioCtx = new AudioContext();
    var analyser = audioCtx.createAnalyser();
    
    var source=audioCtx.createMediaElementSource(audioElement);
    source.connect(analyser);
    analyser.connect(audioCtx.destination);
    analyser.fftSize = 256;
var bufferLength = analyser.frequencyBinCount;
var dataArray = new Uint8Array(bufferLength);

const draw=()=>{
    var container=document.getElementById('vis')
    removeAllChildren(container);
    analyser.getByteFrequencyData(dataArray);
    
    var barHeight;
    var x = 0;
    // var visCont=document.getElementById("vis");
    var divWidth=((500/bufferLength)*0.65);
    var divNumber=parseInt(500/divWidth);
    for(var i = 0; i < bufferLength; i++) {
        var divHeight=dataArray[i]/2;
                    //   var divColor='rgb(93,202,49)';
                   
                      var idArray=new Array(divNumber);
//                        
                      var newDiv=document.createElement("div");

                          newDiv.setAttribute("class","visBar");
                          newDiv.style.width=divWidth+"px";
                          newDiv.style.height=divHeight+"px";
                        container.appendChild(newDiv);
    }
    window.requestAnimationFrame(draw); 
}


draw()
window.requestAnimationFrame(draw);


}

// function draw(AnalyserNode,dataArray,bufferLength){
    
// }

function removeAllChildren(parent){
    while(parent.firstChild){
        parent.removeChild(parent.firstChild);
        
    }
    
}





