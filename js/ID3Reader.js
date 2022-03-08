var jsmediatags = require("jsmediatags");
module.exports=function songReader(){
jsmediatags.read("../Music/Pink_Floyd/WishYouWereHere/ShineOnYouCrazyDiamond(PartsI-V).mp3", {
  onSuccess: function(tag) {
    // console.log(tag);
    
    var tags=tag.tags;
    return tags;
  },
  onError: function(error) {
    console.log(':(', error.type, error.info);
  }
});
}

module.exports=function albumDisplay(id, picture){
    const { data, format } = picture;
let base64String = "";
for (const i = 0; i < data.length; i++) {
  base64String += String.fromCharCode(data[i]);
}

document.getElementById(id).src = `data:${data.format};base64,${window.btoa(base64String)}`;
}
