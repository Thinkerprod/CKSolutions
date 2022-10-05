function receivingSorter(track,song,artist,album,art,year,filename,arraySize){
var songsAlbumOrder=new Array(arraySize)
if(track.length<4){
    var trackNum=track.slice(0,1)
}
else if (track.length==4) {
    var trackNum=track.slice(0,1)
} 
else {
    var trackNum=track.slice(0,2)
}

var songObj={albumArt:art, file:filename, trackNumber:trackNum, songTitle:song, Artist:artist, Album:album, Year:year }
var arrayIndex=(trackNum-1)

console.log(songObj)

songObj

}