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