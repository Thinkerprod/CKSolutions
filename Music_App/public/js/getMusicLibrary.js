module.exports.getArtists=function(){
  const fs=require('fs')

 var artists=fs.readdirSync('./public/Music/')

  return artists
}

module.exports.getAlbums=function(artist){
  const fs=require('fs')

  var albums=fs.readdirSync('./public/Music/'+artist)
 
   return albums
}

