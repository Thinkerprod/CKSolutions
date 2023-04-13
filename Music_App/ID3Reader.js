
var jsmediatags = require('jsmediatags');
var express= require('express');
var app=express();
var pug=require('pug');
const path=require('path')
const fs=require('fs');
const { error } = require('console');
var tagsArray=Array();
var mp=require('./public/js/music-picker.js');


// console.log("this array is:"+albumArray);
const port=3000;
const host='localhost';

app.use('/public', express.static(path.join(__dirname, '/public')));
// app.use('/public/Music', express.static(path.join(__dirname, '/public')));
// app.use( express.static(path.join(__dirname, 'public')));
// app.use('/public', express.static('public'));
app.set('views','./views');
app.set('view engine', 'pug');

const server =app.listen(port, host, ()=>{

  console.log("server started at "+host+" port:"+port);

  
});

// process.on('SIGTERM', () => {
//   server.close(() => {
//     console.log('Process terminated')
//   })
// })


jsmediatags.read("./public/Music/Pink_Floyd/WishYouWereHere/1_ShineOnYouCrazyDiamond(PartsI-V).mp3", {
  onSuccess: function(tag) {

    
    var tags=tag.tags;
    tagsArray=[tags.artist,tags.track,tags.album,tags.title,tags.picture];
    
   
      var base64Url=Buffer.from(tags.picture.data).toString("base64");

    // var base64Url=Buffer.from(base64String).toString("base64");
    var artInfo="data:"+tags.picture.format+";base64,"+base64Url;
    
    console.log(`data:${tags.picture.format};base64,`);

    app.get('/', (req, res)=>{

      res.render("index", {
        artist:tags.artist,
        album: tags.album,
        title: tags.title,
        track: tags.track,
        art: artInfo
        
      });
      console.log('done');
    });


  },
  onError: function(error) {
    console.log(':(', error.type, error.info);
  }
});

mp.defaultAlbumReader();




