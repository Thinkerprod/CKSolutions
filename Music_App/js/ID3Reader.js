
var server=require('http');
var jsmediatags = require('jsmediatags');
var express= require('express');
var app=express();
var pug=require('pug');
var tagsArray=Array();

const port=3000;
const host='localhost';

app.set('views','./views');
app.set('view engine', 'pug');

app.get('/', (req, res)=>{

  res.render('index');

});

app.listen(port, host, ()=>{

  console.log("server started at "+host+"port:"+port);
})



jsmediatags.read("../Music/Pink_Floyd/WishYouWereHere/ShineOnYouCrazyDiamond(PartsI-V).mp3", {
  onSuccess: function(tag) {
    // console.log(tag);
    
    var tags=tag.tags;
    tagsArray=[tags.artist,tags.track,tags.album,tags.title,tags.picture];


    var http = require('http');

var data = "data to send to client";

// var server = http.createServer(function (request, response) {
//     response.writeHead(200, {"Content-Type": "text/plain"});
//     response.write(data); // You Can Call Response.write Infinite Times BEFORE response.end
//     response.end("connected");
  
// }).listen(5500);
    // var artist=tags.artist;
    // app.get('/ID3Reader.js', function (req, res) {
    //   res.json({Array:tagsArray});
    // })
    
    // app.listen(5500)
  },
  onError: function(error) {
    console.log(':(', error.type, error.info);
  }
});


function albumDisplay(picture){
    const { data, format } = picture;
let base64String = "";
for (const i = 0; i < data.length; i++) {
  base64String += String.fromCharCode(data[i]);
}

var pictureData = `data:${data.format};base64,${window.btoa(base64String)}`;
return pictureData;
}



