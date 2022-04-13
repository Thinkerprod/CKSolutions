function albumArt(picture){
    let base64String = "";
for (var i = 0; i < picture.data.length; i++) {
  base64String += String.fromCharCode(picture.data[i]);
}

var pictureData = "data:"+picture.format+";base64,"+window.btoa(base64String);
return pictureData;
}