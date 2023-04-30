
var jsmediatags = require('jsmediatags');
var express= require('express');
var app=express();
var pug=require('pug');
const path=require('path')
const fs=require('fs');
const { error } = require('console');
const tableData=require('./public/js/TableSongData.js');
const mp=require('./public/js/music-picker.js')
const render=require('./public/js/render.js')
const response=require('./public/js/serverResponse.js')


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

// async function sendData(){
 app.get('/request',(req,res)=>{
  console.log(req.query.rowFile+" was clicked")
response.responder(res,req.query.rowFile)
    // console.log(file+" user clicked")
 })
  app.get('/', (req, res)=>{


render.renderPage(res)

    console.log('done');
  });
  
// }
// sendSongData()

// tableData.getTableSongData()

// sendData()




