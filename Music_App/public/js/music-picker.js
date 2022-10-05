exports.defaultAlbumReader=function (){
    var dirArray=new Array()
    var i=0
    var globalFileCount=0
    var pathArray=[]
    
    var jsmediatags = require('jsmediatags');
    const path=require('path')
    var express= require('express');
    var app=express();
    
const fs=require('fs');
const { error } = require('console');



    var filesToCount=fs.readdirSync("./public/Music/Pink_Floyd/WishYouWereHere/") 
    
             
     globalFileCount =  filesToCount.length

console.log("number of files: "+globalFileCount)
var songsAlbumOrder=new Array(globalFileCount)

var files=fs.readdirSync("./public/Music/Pink_Floyd/WishYouWereHere/" )

console.log(files)
var songsAlbumOrder = new Array(globalFileCount)
  


  //sort the files in order of track number ascending
  files.forEach(file => {

    jsmediatags.read("./public/Music/Pink_Floyd/WishYouWereHere/" + file, {
      onSuccess: function (tag) {
        //   console.log(file)
        
        var tags = tag.tags;
        var track=tags.track
        console.log(tags.track)
        if(track.length<4){
          var trackNum=track.slice(0,1)
          }
          else if (track.length==4) {
                  var trackNum=track.slice(0,1)
              } 
          else {
                  var trackNum=track.slice(0,2)
              }
              var arrayIndex=(trackNum-1)
              songsAlbumOrder[arrayIndex]=file
              console.log(songsAlbumOrder[arrayIndex])

        var base64Url=Buffer.from(tags.picture.data).toString("base64");

    
    var artInfo="data:"+tags.picture.format+";base64,"+base64Url;
        app.get('/', (req, res)=>{

          res.render("index", {
            arraySize:globalFileCount,
            fileName:file,
            artist:tags.artist,
            album: tags.album,
            title: tags.title,
            year:tags.year,
            track: tags.track,
            art: artInfo
            
          });
          console.log('done');
        });

      },
      onError: function (error) {
        console.log(':(', error.type, error.info);
      }

    });
   

  });

  
//   var i=0
//   while(i<5){
//       if(songsAlbumOrder[i]!=undefined){
//         console.log(i)
//         i++
//       }
//   }
    
// console.log(songsAlbumOrder)
  

  
//   var arrayIndex=(trackNum-1)

//   console.log(songObj)

//   songsAlbumOrder[arrayIndex] = songObj

//   counter++

// console.log(songsAlbumOrder)

}




    
    // var base64Url=Buffer.from(tags.picture.data).toString("base64");
          
    // var base64Url=Buffer.from(base64String).toString("base64");
    // var artInfo="data:"+tags.picture.format+";base64,"+base64Url;
    
  //   console.log(`data:${tags.picture.format};base64,`);