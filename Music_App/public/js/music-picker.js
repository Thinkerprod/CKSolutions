module.exports.defaultAlbumReader = function () {
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
  app.set('views',path.join(__dirname,'views'));
  app.set('view engine', 'pug');

  var filesToCount = fs.readdirSync(
    './public/Music/Pink Floyd/WishYouWereHere/'
  )

  globalFileCount = filesToCount.length
  console.log('number of files: ' + globalFileCount)



  var files = fs.readdirSync('./public/Music/Pink Floyd/WishYouWereHere/')

  //sort the files in order of track number ascending


  var ordered = getArray(files, globalFileCount)

  const getFiles= ()=>{
    
      return ordered.then(result => {return result})
      .catch(err=>{return err})
      

  }

const getOrderedArray= async ()=>{
  var data=await getFiles()
  return data
}
  
return getOrderedArray()
 
  


}




function awaitableSortingEngine (file) {
  var songsAlbumOrder = new Array(2)
  var jsmediatags = require('jsmediatags')
  return new Promise(function (resolve, reject) {
    jsmediatags.read('./public/Music/Pink Floyd/WishYouWereHere/' + file, {
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
        var arrayIndex = trackNum - 1
        songsAlbumOrder[0] = file
        songsAlbumOrder[1] = arrayIndex
        
        
        setTimeout(() => {
          resolve(songsAlbumOrder)
        }, 1000);

          
        
        
      },
      onError: function (error) {
        console.log(':(', error.type, error.info)
        reject('error: file was rejected')
      }
    })
  })
}


async function getArray (files, arrayCount) {
  arrayPos=new Array(2)
  orderedArray=new Array(arrayCount)
  for (const file of files) {
 
    arrayPos = await awaitableSortingEngine(file)
    var song=arrayPos[1]
    var pos=arrayPos[0]

    
    orderedArray[pos]=song
    
  }


  return orderedArray
}