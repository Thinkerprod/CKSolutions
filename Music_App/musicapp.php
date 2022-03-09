<?php $arrFiles = array();
$handle = opendir("\Music\Pink_Floyd\WishYouWereHere");
 
if ($handle) {
    while (($entry = readdir($handle)) !== FALSE) {
        $arrFiles[] = $entry;
    }
$tags=array();




}
 
closedir($handle); ?>

<!-- $myfile = fopen("Music/Pink_Floyd/WishYouWereHere/ShineOnYouCrazyDiamond(PartsI-V).mp3", "r") or die("Unable to open file!");
echo fread($myfile,filesize("Music/Pink_Floyd/WishYouWereHere/ShineOnYouCrazyDiamond(PartsI-V).mp3"));
fclose($myfile); -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <script src="js/jsmediatags.min.js"></script>
    <script src="js/jsmediatags.js"></script>
    <script src="js/jdataview.js"></script>
</head>

<body>
    <?php echo "Hello";?>
    <img src="" alt="">
    <h2>Artist: </h2>
    <audio controls src="Music/Pink_Floyd/WishYouWereHere/ShineOnYouCrazyDiamond(PartsI-V).mp3"></audio>
    <script>
//       var reader=new FileReader();

//       reader.onload=function(e){
        
//       var jview= new jdataview("Music/Pink_Floyd/WishYouWereHere/ShineOnYouCrazyDiamond(PartsI-V).mp3");
//       // "TAG" starts at byte -128 from EOF.
//   // See <a href="http://en.wikipedia.org/wiki/ID3" target="_blank">http://en.wikipedia.org/wiki/ID3</a>
//   if (dv.getString(3, dv.byteLength - 128) == 'TAG') {
//     var title = dv.getString(30, dv.tell());
//     var artist = dv.getString(30, dv.tell());
//     var album = dv.getString(30, dv.tell());
//     var year = dv.getString(4, dv.tell());
//   } else {
//     // no ID3v1 data found.
//   }
// };

// reader.readAsArrayBuffer(this.files[0]);
    

      // const jsmediatags=require("jsmediatags");
        var jsmediatags = window.jsmediatags;
        // alert(jsmediatags);
        var tags = {};
        // jsmediatags.Reader.config.
         jsmediatags.read("https://github.com/Thinkerprod/CKSolutions/blob/main/Music/Pink_Floyd/WishYouWereHere/Have%20A%20Cigar.mp3", {
   onSuccess: function(tag) {
      // tags = tag;
      alert("woof");
      alert(tag);
   }, 
   onError: function(error) {
      // handle error
      console.log("Meow");
      alert("meow");
   }
});

  // .setTagsToRead(["title", "track"])
  // .read({
  //   onSuccess: function(tag) {
  //     var tags = tag.tags;
  //     alert(tags.title + " - " + tags.track);
  //   },
  //   onError: function(error) {
  //     if (error.type === "xhr") {
  //       console.log("There was a network error: ", error.xhr);
  //     }
  //   }
  // });
    </script>
</body>
</html>