module.exports.defaultAlbumReader = async function () {
 var globalFileCount = 0


  var express = require('express')
  var app = express()
  const path = require('path')



  const fs = require('fs')
  const { error } = require('console')

  app.use('/public', express.static(path.join(__dirname, '/public')))
  // app.use('/public/Music', express.static(path.join(__dirname, '/public')));
  // app.use( express.static(path.join(__dirname, 'public')));
  // app.use('/public', express.static('public'));
  // app.set('views',path.join(__dirname,'views'));
  // app.set('view engine', 'pug');

  // getArtists()
  // getAlbums('Pink Floyd')
  var filesToCount = fs.readdirSync(
    './public/Music/Pink Floyd/WishYouWereHere/'
  )

  globalFileCount = filesToCount.length
  console.log('number of files: ' + globalFileCount)



  // var files = fs.readdirSync('./public/Music/Pink Floyd/WishYouWereHere/')

  //sort the files in order of track number ascending
var songArray=await getArray()
return songArray
//   var ordered = getArray(files, globalFileCount)

//   const getFiles= ()=>{
    
//       return ordered.then(result => {return result})
//       .catch(err=>{return err})
      

//   }

// const getOrderedArray= async ()=>{
//   var data=await getFiles()
//   return data
// }
  
// return getOrderedArray()
 
  


}




function awaitableSortingEngine () {
  // var songsAlbumOrder = new Array(2)
  var jsmediatags = require('jsmediatags')
  return new Promise(function (resolve, reject) {
    jsmediatags.read('./public/Music/Pink Floyd/WishYouWereHere/1_ShineOnYouCrazyDiamond(PartsI-V).mp3' , {
      onSuccess: function (tag) {

        //changes the track number from a fraction to a straight number
        var tags = tag.tags
        var track = tags.track
        console.log(tags.track)
        if (track.length < 4) {
          var trackNum = track.slice(0, 1)
        } else if (track.length == 4) {
          var trackNum = track.slice(0, 1)
        } else {
          var trackNum = track.slice(0, 2)
        }
        // var arrayIndex = trackNum - 1
       

        var artInfo=`data:${tags.picture.format};base64,${Buffer.from(tags.picture.data).toString("base64")}`;
        
        var displayData=[tags.artist,tags.album,tags.title,trackNum,artInfo]
        
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

async function getArray(){
  var songArray=await awaitableSortingEngine()
  console.log()
  return songArray
}





// function getArtists(){
//   const fs=require('fs')

//  var artists=fs.readdirSync('./public/Music/')

//   console.log(artists)
// }

// function getAlbums(artist){

//   const fs=require('fs')

//   var albums=fs.readdirSync('./public/Music/'+artist)
 
//    console.log(albums)
  
// }