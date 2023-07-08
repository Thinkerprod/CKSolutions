var path="Music/Pink_Floyd/WishYouWereHere/ShineOnYouCrazyDiamond(PartsI-V).mp3"

var audioElement=createMusicPlayer(path)

function createMusicPlayer(path){
    var audioElement=document.createElement("audio");
    audioElement.src=path
    audioElement.load()

return audioElement
}

document.getElementById('playBtn').addEventListener('click',()=>{
play()
})

document.getElementById('pauseBtn').addEventListener('click',()=>{
    pause()
    })

    document.getElementById('stopBtn').addEventListener('click',()=>{
        stop()
        })

function play(){
    audioElement.play()
    visualizerStart(audioElement)
}

function pause(){

    
    if(!audioElement.paused){
        // console.log(song.paused)
        audioElement.pause()
    }
    else{
        audioElement.play()
        visualizerStart(audioElement)
    }
}

function stop(){
    audioElement.pause()
    audioElement.currentTime=0
    
}


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

                          newDiv.setAttribute("class","childDiv");
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
