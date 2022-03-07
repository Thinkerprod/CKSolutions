var jsmediatags = require("jsmediatags");

jsmediatags.read("Music/Pink_Floyd/WishYouWereHere/ShineOnYouCrazyDiamond(PartsI-V).mp3", {
  onSuccess: function(tag) {
    console.log(tag);
  },
  onError: function(error) {
    console.log(':(', error.type, error.info);
  }
});
