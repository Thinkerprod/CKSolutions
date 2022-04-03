
// var server=require('http');
var jsmediatags = require('jsmediatags');
var express= require('express');
var app=express();
var pug=require('pug');
const fs=require('fs');
var tagsArray=Array();

const port=3000;
const host='localhost';

app.set('views','./views');
app.set('view engine', 'pug');



const server =app.listen(port, host, ()=>{

  console.log("server started at "+host+"port:"+port);

  
});

process.on('SIGTERM', () => {
  server.close(() => {
    console.log('Process terminated')
  })
})


jsmediatags.read("./Music/Pink_Floyd/WishYouWereHere/ShineOnYouCrazyDiamond(PartsI-V).mp3", {
  onSuccess: function(tag) {
    // console.log(tag);
    
    var tags=tag.tags;
    tagsArray=[tags.artist,tags.track,tags.album,tags.title,tags.picture];
    var artist=tags.artist;
    var album=tags.album;
    var title=tags.title;
    var track=tags.track;
    // var albumCover=albumDisplay(tags.picture);

    app.get('/', (req, res)=>{

      res.render("index", {
        artist,
        album,
        title,
        track
        
      });
    
    //   res.render('index');
    
    });



  },
  onError: function(error) {
    console.log(':(', error.type, error.info);
  }
});


function albumDisplay(picture){
    const { data, format } = picture;
let base64String = "";
for (var i = 0; i < data.length; i++) {
  base64String += String.fromCharCode(data[i]);
}

var pictureData = `data:${data.format};base64,${window.btoa(base64String)}`;
return pictureData;
}



