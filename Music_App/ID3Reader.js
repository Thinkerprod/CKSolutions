
var jsmediatags = require('jsmediatags');
var express= require('express');
var app=express();
var pug=require('pug');
const path=require('path')
const fs=require('fs');
const { error } = require('console');
const tableData=require('./public/js/TableSongData.js');




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

async function sendData(){
 
  app.get('/', (req, res)=>{

    res.render("index", {
      artist:tags.artist,
      album: tags.album,
      title: tags.title,
      track: tags.track,
      art: artInfo,
      
    });
    console.log('done');
  });

}
// sendSongData()

tableData.getTableSongData()

// sendData()




