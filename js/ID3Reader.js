var jsmediatags = require("jsmediatags");

function readId3(filepath){jsmediatags.read(filepath, {
  onSuccess: function(tag) {
    console.log(tag);
  },
  onError: function(error) {
    console.log(':(', error.type, error.info);
  }
});
}
