
var server=require('http');
var jsmediatags = require('jsmediatags');
var express= require('express');
var app=express();
var tagsArray=new Array();



jsmediatags.read("../Music/Pink_Floyd/WishYouWereHere/ShineOnYouCrazyDiamond(PartsI-V).mp3", {
  onSuccess: function(tag) {
    // console.log(tag);
    
    var tags=tag.tags;
    tagsArray=[tags.artist,tags.track,tags.album,tags.title,tags.picture];


    var http = require('http');

var data = "data to send to client";

var server = http.createServer(function (request, response) {
    response.writeHead(200, {"Content-Type": "text/plain"});
    response.write(data); // You Can Call Response.write Infinite Times BEFORE response.end
    response.end("Hello World\n");
  
}).listen(5500);
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


function albumDisplay(id, picture){
    const { data, format } = picture;
let base64String = "";
for (const i = 0; i < data.length; i++) {
  base64String += String.fromCharCode(data[i]);
}

var pictureData = `data:${data.format};base64,${window.btoa(base64String)}`;
return pictureData;
}



