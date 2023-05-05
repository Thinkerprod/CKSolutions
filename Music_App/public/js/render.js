module.exports.renderPage=async function(res){
var mp=require('./music-picker.js')
var table=require('./TableSongData.js')
var gm=require('./getMusicLibrary.js')

var artists=gm.getArtists()

var musicLibrary=new Array(artists.length)
for(var i=0;i<artists.length;i++){
  musicLibrary[i]={'artist':artists[i],'albums':gm.getAlbums(artists[i])}
  
}
console.log(musicLibrary)
var displayData=await mp.defaultAlbumReader()

var artistDisplay=displayData[0]
var albumDisplay=displayData[1]
var titleDisplay=displayData[2]
var trackNum=displayData[3]
var artInfo=displayData[4]
// console.log(displayData+"roaaar")
var tableData=await table.getTableSongData()

    res.render("index", {
        
        musicLibrary:musicLibrary,
        artist:artistDisplay,
        album: albumDisplay,
        title: titleDisplay,
        track: trackNum,
        art: artInfo,
        tableArray:tableData,
        path:"/public/Music/Pink Floyd/Wish You Were Here/1_ShineOnYouCrazyDiamond(PartsI-V).mp3"
        
        
      });
}

