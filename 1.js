divideAndSort(2131312)
function divideAndSort(param){
  if(isNaN(param)){
  	alert("Paramater harus berupa Integer");
  }
  
  var hasil = [];
  var digits = (""+param).split("0");
  for(var i=0; i < digits.length; i++){
  	var sort_num = digits[i].split("").sort().join("");
    hasil[i] = sort_num;
  }
  console.log(parseInt(hasil.join("")));
  	
  
}

