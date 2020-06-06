cetak_gambar(5);
function cetak_gambar(param){
  if(param % 2 == 0){
      alert("Bilangan harus ganjil");
      return false;
  }
  
  var gambar ="\n";
  var jumlah = 0;
  for(var hitung = 1; hitung <= param; hitung++){
    jumlah+= hitung;
  }

  nilai_tengah = jumlah/param;

  for(var i =0; i < param; i++){
    gambar += " * ";
    
    if(i == nilai_tengah - 1){
    
      for(var j =1; j < param; j++){
        if(j == param - 1 ){
          gambar += " * ";
        }else{
          gambar += " * ";
        }
      }
    }else{
      for(var j =1; j < param; j++){
        if(j == param - 1 ){
          gambar += " * ";
        }else{
          gambar += " = ";
        }
      }
    }
    gambar+="\n";
    
  }
  console.log(gambar);
}