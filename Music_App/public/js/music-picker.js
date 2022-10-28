exports.defaultAlbumReader=function (){
  var dirArray=new Array()
  
  var globalFileCount=0
  var pathArray=[]
  
  var jsmediatags = require('jsmediatags');
  const path=require('path')
  var express= require('express');
  var app=express();
  
const fs=require('fs');
const { error } = require('console');



  var filesToCount=fs.readdirSync("./public/Music/Pink_Floyd/WishYouWereHere/");
  
           
   globalFileCount =  filesToCount.length;
console.log("number of files: "+globalFileCount);
var songsAlbumOrder=new Array(globalFileCount);
var index=new Array(globalFileCount);

var files=fs.readdirSync("./public/Music/Pink_Floyd/WishYouWereHere/" );

console.log(files);




//sort the files in order of track number ascending
//for of loop here
 function awaitableSortingEngine(file){
  return new Promise(function(resolve,reject){

  // console.log(file);
   
  
    
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
            
            resolve(songsAlbumOrder);
      // var base64Url=Buffer.from(tags.picture.data).toString("base64");

  
  // var artInfo="data:"+tags.picture.format+";base64,"+base64Url;
  //     app.get('/', (req, res)=>{

  //       res.render("index", {
  //         arraySize:globalFileCount,
  //         fileName:file,
  //         artist:tags.artist,
  //         album: tags.album,
  //         title: tags.title,
  //         year:tags.year,
  //         track: tags.track,
  //         art: artInfo
          
  //       });
  //       console.log('done');
  //     });

    },
    onError: function (error) {
      console.log(':(', error.type, error.info);
      reject("error: file was rejected");
    }
  
  });
  
  
  // setTimeout(resolve,1000)
  


});

// var finishedArray = await arrayPromise;

// let finishedArray=sortingEngine(files);
}




async function getArray(files){
  
  for(const file of files){
    var data=await awaitableSortingEngine(file);
    // console.log(data)
  }

//  setTimeout((data),1000)
 return data
}
async function displayData(){
  var data=await getArray(files);
  // console.log(promises.all(data))
  // data.then((arrayResult)=>{console.log(arrayResult)});
  return data
}

var orderedArray=displayData();


for(var i=0;i<orderedArray.length;i++){

jsmediatags.read("./public/Music/Pink_Floyd/WishYouWereHere/" + orderedArray[i], {
    
  onSuccess: function (tag) {
    //   console.log(file)
    
    var tags = tag.tags;
    
    // var base64Url=Buffer.from(tags.picture.data).toString("base64");


// var artInfo="data:"+tags.picture.format+";base64,"+base64Url;
    app.get('/', (req, res)=>{

      res.render("index", {
        
        tableArtist:tags.artist,
        tableAlbum: tags.album,
        tableTitle: tags.title,
        tableYear:tags.year,
        tableTrack: tags.track
        // art: artInfo
        
      });
      console.log('done');
    });

  },
  onError: function (error) {
    console.log(':(', error.type, error.info);
   
  }

});

}





}

        // var base64Url=Buffer.from(tags.picture.data).toString("base64");

    
    // var artInfo="data:"+tags.picture.format+";base64,"+base64Url;
    //     app.get('/', (req, res)=>{

    //       res.render("index", {
    //         arraySize:globalFileCount,
    //         fileName:file,
    //         artist:tags.artist,
    //         album: tags.album,
    //         title: tags.title,
    //         year:tags.year,
    //         track: tags.track,
    //         art: artInfo
            
    //       });
    //       console.log('done');
    //     });
    
