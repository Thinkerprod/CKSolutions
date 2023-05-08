module.exports.responder=async function(res,dataReceived){

    var displayData=await awaitableSortingEngine(dataReceived)




    const request=[
    displayData[0],
    displayData[1],
    displayData[2],
    
    displayData[3]
    ]

res.send(request)
}

function awaitableSortingEngine (file) {
    // var songsAlbumOrder = new Array(2)
    var jsmediatags = require('jsmediatags')
    return new Promise(function (resolve, reject) {
      jsmediatags.read('./public/Music/Pink Floyd/Wish You Were Here/'+file , {
        onSuccess: function (tag) {
  
          //changes the track number from a fraction to a straight number
          var tags = tag.tags
        //   var track = tags.track
        //   console.log(tags.track)
        //   if (track.length < 4) {
        //     var trackNum = track.slice(0, 1)
        //   } else if (track.length == 4) {
        //     var trackNum = track.slice(0, 1)
        //   } else {
        //     var trackNum = track.slice(0, 2)
        //   }
          // var arrayIndex = trackNum - 1
         
  
          var artInfo=`data:${tags.picture.format};base64,${Buffer.from(tags.picture.data).toString("base64")}`;
          
          var displayData=[tags.artist,tags.album,tags.title,artInfo]
          
          // setTimeout(() => {
            resolve(displayData)
          // }, 1000);
  
            
          
          
        },
        onError: function (error) {
          console.log(':(', error.type, error.info)
          reject('error: file was rejected')
        }
      })
    })
  }



  module.exports.musicLibraryResponder=async function(res,dataReceived){
    var sortedArray=await getTableDataLoop(dataReceived[0],dataReceived[1])
    res.send(sortedArray)
  
  }

  function awaitableLibrarySortingEngine (file,album,artist) {
    // var songsAlbumOrder = new Array(2)
    var jsmediatags = require('jsmediatags')
    return new Promise(function (resolve, reject) {
      jsmediatags.read('./public/Music/'+artist+'/'+album+'/'+file , {
        onSuccess: function (tag) {
  
          //changes the track number from a fraction to a straight number
          var tags = tag.tags
          var track = tags.track
          // console.log(tags.track)
          if (track.length < 4) {
            var trackNum = track.slice(0, 1)
          } else if (track.length == 4) {
            var trackNum = track.slice(0, 1)
          } else {
            var trackNum = track.slice(0, 2)
          }
          // var arrayIndex = trackNum - 1
         
  
          var artInfo=`data:${tags.picture.format};base64,${Buffer.from(tags.picture.data).toString("base64")}`;
          
          var displayData=[file,trackNum,tags.title,tags.artist,tags.album,tags.year,artInfo]
          
          // setTimeout(() => {
            resolve(displayData)
          // }, 1000);
  
            
          
          
        },
        onError: function (error) {
          console.log(':(', error.type, error.info)
          reject('error: file was rejected')
        }
      })
    })
  }

  function getSongList(artist,album){
    const fs=require('fs')

    var songsArray = fs.readdirSync(
        './public/Music/'+artist+'/'+album+'/'
      )

      return songsArray
}

function countFiles(artist,album){
  const fs=require('fs')

  var filesToCount = fs.readdirSync(
    './public/Music/'+artist+'/'+album+'/'
    )
  
    FileCount = filesToCount.length
    console.log('number of files: ' + FileCount)
  
  
  
    return FileCount
}

async function getTableDataLoop(artist,album){
     
  var fileCount=countFiles(artist,album)
  const songsArray=getSongList(artist,album)
  // console.log(songsArray+'ruff')
  var songDataArray=new Array(fileCount)
  // var counter=0
  for(var i=0;i<songsArray.length;i++){
    

      // songDataArray[i]=getTableDataPromise(songsArray[i])
      
      // setTimeout(()=>{},500)
      songDataArray[i]=await awaitableLibrarySortingEngine(songsArray[i],album,artist)
      // setTimeout(()=>{},500)
      
    }
    
    // console.log(songDataArray+"mooooo")
    var sortedSongDataArray=songDataArray.sort((a,b)=>a[0]-b[0])

    return sortedSongDataArray
  }