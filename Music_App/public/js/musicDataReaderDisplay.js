module.exports.musicDataReaderDisplay = function () {

    jsmediatags.read("./public/Music/Pink Floyd/WishYouWereHere/1_ShineOnYouCrazyDiamond(PartsI-V).mp3", {
        onSuccess: function(tag) {
      
          
          var tags=tag.tags;
          // tagsArray=[tags.artist,tags.track,tags.album,tags.title,tags.picture];
          
         
            var base64Url=Buffer.from(tags.picture.data).toString("base64");
      
          // var base64Url=Buffer.from(base64String).toString("base64");
          var artInfo="data:"+tags.picture.format+";base64,"+base64Url;
          
          console.log(`data:${tags.picture.format};base64,`);

          var track = tags.track
          console.log(tags.track)
          if (track.length < 4) {
            var trackNum = track.slice(0, 1)
          } else if (track.length == 4) {
            var trackNum = track.slice(0, 1)
          } else {
            var trackNum = track.slice(0, 2)
          }

          var artist=tags.artist
            var album= tags.album
            var title=tags.title

      var metadata = {artist,album,title,trackNum,artInfo}

            
            return metadata


        //   app.get('/', (req, res)=>{
      
        //     res.render("index", {
        //       artist:tags.artist,
        //       album: tags.album,
        //       title: tags.title,
        //       track: tags.track,
        //       art: artInfo,
              
        //     });
        //     console.log('done');
        //   });
      
      
        },
        onError: function(error) {
          console.log(':(', error.type, error.info);
        }
      });


}