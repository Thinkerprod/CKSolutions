exports.defaultAlbumReader=function (){
    var dirArray=[]
    var i=0
    var pathArray=[]
    var songsAlbumOrder=[]
    var jsmediatags = require('jsmediatags');
    const path=require('path')
    var express= require('express');
    var app=express();
    
const fs=require('fs');
const { error } = require('console');

fs.readdir("./public/Music/Pink_Floyd/WishYouWereHere/", 
    (err, files) => {
    console.log("\nCurrent directory files:");
    if (err)
      console.log(err);
    else {
      files.forEach(file => {
        // console.log(file);
        // dirArray=[file];
        // console.log(i+" "+dirArray)



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
              songsAlbumOrder=songsAlbumOrder.splice(ArrayNumber,0, file)
              console.log("album songs in order:  " + songsAlbumOrder[ArrayNumber])
             
                var base64Url=Buffer.from(tags.picture.data).toString("base64");
          
              // var base64Url=Buffer.from(base64String).toString("base64");
              var artInfo="data:"+tags.picture.format+";base64,"+base64Url;
              
            //   console.log(`data:${tags.picture.format};base64,`);
          
              app.get('/', (req, res)=>{
          
                res.render("index", {
                  defartist:tags.artist,
                  defalbum: tags.album,
                  deftitle: tags.title,
                  deftrack: tags.track,
                  defart: artInfo
                  
                });
                console.log('done');
              });
          
          
            },
            onError: function(error) {
              console.log(':(', error.type, error.info);
            }
          });

     i++

      })
    }
  })
    }
    
