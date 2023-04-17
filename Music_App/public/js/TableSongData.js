// const { promises } = require('dns');

module.exports.getTableSongData= function (){


  arraySorter()
 
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


     async function getTableDataLoop(){
     
        
        const songsArray=getSongList()
        // console.log(songsArray+'ruff')
        var songDataArray=new Array(5)
        var counter=0
        for(var i=0;i<songsArray.length;i++){
          

            // songDataArray[i]=getTableDataPromise(songsArray[i])
            
            setTimeout(()=>{},1000)
            songDataArray[i]=await tableDataGatherer(songsArray[i])
            setTimeout(()=>{},1000)
            
          }
          
          console.log(songDataArray+"mooooo")

          return songDataArray
    }

    function tableDataGatherer(song){
       
    //   var songObj=new Array(5)
        const jsmediatags=require('jsmediatags')
        // const songValues=new Array(5)
   return new Promise (function(resolve,reject){
        jsmediatags.read("./public/Music/Pink Floyd/WishYouWereHere/"+song, {
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
          var songFile=toString(song)
        var songObj=[tableTrackNum,tableArtist,tableTitle,tableAlbum,tableYear,songFile]
        //   console.log(songObj[1])
       
          setTimeout(()=>{ resolve(songObj) },1000)
           

          
            },
            onError: function(error) {
              console.log(':(', error.type, error.info);
                reject("something went wrong")
            }
          });
        })
          
// const songData=as()=>{
//     songValues.then()
}
        //   setTimeout(() => {
        //     return songValues
        //   }, 500);
        
    

    function arraySorter(){
        var toBeSorted=getTableDataLoop()
        var fileCount=countFiles()
        var countedArray=new Array(fileCount)
        var finalObj={}
        
        for(var i=0;i<countedArray.length;i++){
            countedArray[i]=i+1
        }
        console.log(countedArray+"arf")
//creates an array of JSON literals
        for(var i=0;i<countedArray.length;i++){
            for(var j=0;j<toBeSorted.length;j++){
                if(toBeSorted[j]==countedArray[i]){


                    var key = countedArray[i]
                    var set="{"+key+":[{'artist':"+toBeSorted[j+1]+",'title':"+toBeSorted[j+2]+",'album':"+toBeSorted[j+3]+",'year':"+toBeSorted[j+4]+",'filename':"+toBeSorted[j+5]+"}]"+"}"
                    var stringSet=toString(set)
                    countedArray[i]=stringSet



                }
            }
        }

        console.log(countedArray)

    }


    // function getTableDataPromise(song){
    //     var songDataPromises= tableDataGatherer(song)
    //     const songData = ()=>{
    //         return songDataPromises.then(result=>{return result})
    //         .catch(err=>{return err})
    //     }

    //     const getSongData=async ()=>{
    //         var data=await songData()
    //         return data
    //     }

    //     return getSongData()
    // }

    function getSongList(){
        const fs=require('fs')

        var songsArray = fs.readdirSync(
            './public/Music/Pink Floyd/WishYouWereHere/'
          )

          return songsArray
    }