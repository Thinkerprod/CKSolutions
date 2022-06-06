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

function getFileCount(){

    var files=fs.readdirSync("./public/Music/Pink_Floyd/WishYouWereHere/") 
    
    
        console.log("#ofFiles"+files.length) 
     return  files.length
     
 

}

globalFileCount = getFileCount();


console.log("number of files: "+globalFileCount)


fs.readdir("./public/Music/Pink_Floyd/WishYouWereHere/", 
    (err, files) => {
    console.log("\nCurrent directory files:");
    if (err)
      console.log(err);
    else {
      files.forEach(file => {


 jsmediatags.read("./public/Music/Pink_Floyd/WishYouWereHere/"+file, {
            onSuccess: function(tag) {
        //   console.log(file)
                var i=0
                var tagsTableArray=[]
              var tags=tag.tags;
              tagsArray=[tags.artist,tags.track,tags.album,tags.title,tags.picture];
              var artist=tags.artist;
              var album=tags.album;
              var title=tags.title;
              var track=tags.track.slice(0,1);
            
              
              
              console.log("track number: " +track+" "+file )
            var ArrayNumber=track-1;
            console.log(globalFileCount)
            var songsAlbumOrder=new Array(globalFileCount)
              songsAlbumOrder[ArrayNumber]=file
              console.log("album songs in order:  " + "song: " + songsAlbumOrder[ArrayNumber])
            //  console.log(ArrayNumber)
               

            },
            onError: function(error) {
              console.log(':(', error.type, error.info);
            }
          });
for(var i=0;i<songsAlbumOrder.length;i++){

     //Place jsmediatag api here
     jsmediatags.read("./public/Music/Pink_Floyd/WishYouWereHere/"+songsAlbumOrder[i], {
        onSuccess: function(tag) {
      
          
          var tags=tag.tags;
          tagsArray=[tags.artist,tags.track,tags.album,tags.title,tags.picture];
          var artist=tags.artist;
          var album=tags.album;
          var title=tags.title;
          var track=tags.track;
         
            var base64Url=Buffer.from(tags.picture.data).toString("base64");
      
          // var base64Url=Buffer.from(base64String).toString("base64");
          var artInfo="data:"+tags.picture.format+";base64,"+base64Url;
          
          console.log(`data:${tags.picture.format};base64,`);
      
    app.get('/', (req, res)=>{
          
        res.render("index", {
          defartist:tags.artist,
          defalbum: tags.album,
          deftitle: tags.title,
          deftrack: tags.track,
          defart: artInfo
          
        });
        
      });
      
      
        },
        onError: function(error) {
          console.log(':(', error.type, error.info);
        }
      });}

      })
    }
  })
    }


    
    // var base64Url=Buffer.from(tags.picture.data).toString("base64");
          
    // var base64Url=Buffer.from(base64String).toString("base64");
    // var artInfo="data:"+tags.picture.format+";base64,"+base64Url;
    
  //   console.log(`data:${tags.picture.format};base64,`);