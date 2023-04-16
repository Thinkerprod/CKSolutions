// const { promises } = require('dns');

module.exports.getTableSongData=async function (){

    var mp=require('./music-picker.js')

    const songs = await mp.defaultAlbumReader();

   

  getTableDataLoop()
 
    }
  
    function countFiles(){
        const fs=require('fs')

        var filesToCount = fs.readdirSync(
            './public/Music/Pink Floyd/WishYouWereHere/'
          )
        
          FileCount = filesToCount.length
          console.log('number of files: ' + FileCount)
        
        
        
          return FileCount
    } 


     async function getTableDataLoop(songsArray){
        var counter=0
        var numOfFiles=countFiles()
        var songDataArray=new Array(numOfFiles)
        for(const song in songsArray){
        
            var songData=await tableDataGatherer(song)
            songDataArray[counter]=songData
            counter++
            
          }

          console.log(songDataArray)
    }

    function tableDataGatherer(song){
        return new Promise(function (resolve, reject) {
        jsmediatags.read("./public/Music/Pink Floyd/WishYouWereHere/"+song, {
            onSuccess: function(tag) {
          
              
              var tags=tag.tags;
              

          console.log("you made it!!")
        
        
          var track = tags.track
          console.log(tags.track)
          if (track.length < 4) {
            var tableTrackNum = track.slice(0, 1)
          } else if (track.length == 4) {
            var tableTrackNum = track.slice(0, 1)
          } else {
            var tableTrackNum = track.slice(0, 2)
          }
        
          var tableArtist=tags.artist
          var tableTitle=tags.title
          var tableAlbum=tags.album
          var tableYear=tags.year
          song={trackNum:tableTrackNum,artist:tableArtist,title:tableTitle,album:tableAlbum,year:tableYear}

          resolve(song)
            },
            onError: function(error) {
              console.log(':(', error.type, error.info);
              reject("it didn't do it")
            }
          });
        })
    }