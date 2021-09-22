document.querySelector('input[type="file"]').onchange=function(e){

     
    var audReader= new FileReader();



        audReader.onload=function (e){
        var dv=new jDataView(this.result);
        

        if(dv.getString(3, dv.byteLength-128)){
            var title=dv.getString(30, dv.tell());
            var artist=dv.getString(30, dv.tell());
            var album=dv.getString(30, dv.tell());
            var year=dv.getString(4, dv.tell());
        }
        else{
            console.log("No ID3V1 Data");
        }
        };

        audReader.readAsArrayBuffer(this.files[0]);
    };
