module.exports.renderPage=async function(res){
var mp=require('./music-picker.js')
var table=require('./TableSongData.js')

var displayData=await mp.defaultAlbumReader()

var artistDisplay=displayData[0]
var albumDisplay=displayData[1]
var titleDisplay=displayData[2]
var trackNum=displayData[3]
var artInfo=displayData[4]
// console.log(displayData+"roaaar")
var tableData=await table.getTableSongData()

    res.render("index", {
        artist:artistDisplay,
        album: albumDisplay,
        title: titleDisplay,
        track: trackNum,
        art: artInfo,
        tableArray:tableData
        
        
      });
}