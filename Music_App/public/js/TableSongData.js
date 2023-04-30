// const { promises } = require('dns');

module.exports.getTableSongData= async function (){


   var sortedArray=await getTableDataLoop()
    return sortedArray
    }
  
    function countFiles(){
        const fs=require('fs')

        var filesToCount = fs.readdirSync(
            './public/Music/Pink Floyd/Wish You Were Here/'
          )
        
          FileCount = filesToCount.length
          console.log('number of files: ' + FileCount)
        
        
        
          return FileCount
    } 


     async function getTableDataLoop(){
     
        var fileCount=countFiles()
        const songsArray=getSongList()
        // console.log(songsArray+'ruff')
        var songDataArray=new Array(fileCount)
        // var counter=0
        for(var i=0;i<songsArray.length;i++){
          

            // songDataArray[i]=getTableDataPromise(songsArray[i])
            
            // setTimeout(()=>{},500)
            songDataArray[i]=await tableDataGatherer(songsArray[i])
            // setTimeout(()=>{},500)
            
          }
          
          console.log(songDataArray+"mooooo")
          var sortedSongDataArray=songDataArray.sort((a,b)=>a[0]-b[0])

          return sortedSongDataArray
        }
          

    function tableDataGatherer(song){
       
    //   var songObj=new Array(5)
        const jsmediatags=require('jsmediatags')
        // const songValues=new Array(5)
   return new Promise (function(resolve,reject){
        jsmediatags.read("./public/Music/Pink Floyd/Wish You Were Here/"+song, {
            onSuccess: function(tag) {
          
              
              var tags=tag.tags;
              

        //   console.log("you made it!!")
        
        
          var track = tags.track
          
          if (track.length < 4) {
            var tableTrackNum = track.slice(0, 1)
          } else if (track.length == 4) {
            var tableTrackNum = track.slice(0, 1)
          } else {
            var tableTrackNum = track.slice(0, 2)
          }
        //   console.log(tableTrackNum)
          var tableArtist=tags.artist
          var tableTitle=tags.title
          var tableAlbum=tags.album
          var tableYear=tags.year
        //   console.log(song)
    
        var songObj=[tableTrackNum,tableArtist,tableTitle,tableAlbum,tableYear,song]
        //   console.log(songObj[1])
       
          // setTimeout(()=>{  },500)
           
          resolve(songObj)
          
            },
            onError: function(error) {
              console.log(':(', error.type, error.info);
                reject("something went wrong")
            }
          });
        })
      }   
        
    

    // async function arraySorter(){
    //     var toBeSorted=await getTableDataLoop()
    //     // console.log(toBeSorted)
    //     const sortedSongData=toBeSorted.sort((a,b)=>a[0]-b[0])
    //     console.log(sortedSongData)
      
    //     //  sortedSongData

        
    // }


    function getSongList(){
        const fs=require('fs')

        var songsArray = fs.readdirSync(
            './public/Music/Pink Floyd/Wish You Were Here/'
          )

          return songsArray
    }