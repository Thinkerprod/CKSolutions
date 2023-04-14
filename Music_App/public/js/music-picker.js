module.exports.defaultAlbumReader = function () {
  var dirArray = new Array()

  var globalFileCount = 0
  var pathArray = []

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
    './public/Music/Pink_Floyd/WishYouWereHere/'
  )

  globalFileCount = filesToCount.length
  console.log('number of files: ' + globalFileCount)



  var files = fs.readdirSync('./public/Music/Pink_Floyd/WishYouWereHere/')

  //sort the files in order of track number ascending




  

  var ordered = getArray(files, globalFileCount)
  
  setTimeout(() => {
  ordered.then(result => sendToFront(result));
  }, 3000);
  


}




function awaitableSortingEngine (file,arrayCount) {
  var songsAlbumOrder = new Array(2)
  var jsmediatags = require('jsmediatags')
  return new Promise(function (resolve, reject) {
    jsmediatags.read('./public/Music/Pink_Floyd/WishYouWereHere/' + file, {
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

function sendToFront (fileArray) {
  console.log(fileArray)
  var express = require('express')
  var app = express()
  console.log('moooo')
  var jsmediatags = require('jsmediatags')
  for (const file of fileArray) {
    jsmediatags.read('./public/Music/Pink_Floyd/WishYouWereHere/' + file, {
      onSuccess: function (tag) {
        var tags = tag.tags

        console.log(tags.title+" gzgxrhbdx")
        //  console.log('made it')
        // var base64Url=Buffer.from(tags.picture.data).toString("base64");

        // var base64Url=Buffer.from(base64String).toString("base64");
        // var artInfo="data:"+tags.picture.format+";base64,"+base64Url;

        // console.log(`data:${tags.picture.format};base64,`);
        // var songRow=[tags.artist,tags.track,tags.album,tags.title,tags.year];

        // app.get('../js', (req, res) => {
        //   res.render('../../views/index', {
        //     temp: tags.artist
        //   })
        //   console.log('yayyyyyy')
        // })
        songs=new Array()
        songs = '{'+file+' : [' +
'{ "fileName":'+file+',"track":'+tags.track+', "title":'+tags.title+', "artist":'+tags.artist+',"album":'+tags.album+',"year":'+tags.year+'} ]}';

        
      },
      onError: function (error) {
        console.log(':(', error.type, error.info)
      }
    })
  }
}

async function getArray (files, arrayCount) {
  arrayPos=new Array(2)
  orderedArray=new Array(arrayCount)
  for (const file of files) {
 
    arrayPos = await awaitableSortingEngine(file, arrayCount)
    var song=arrayPos[0]
    var pos=arrayPos[1]

    
    orderedArray[pos]=song
    
  }


  return orderedArray
}